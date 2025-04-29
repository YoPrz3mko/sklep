<?php
// Include necessary files
include 'db_connection.php';
include 'functions.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// If no product ID provided, redirect to home page
if ($product_id === 0) {
    header('Location: index.php');
    exit;
}

// Get product info
$product_query = "SELECT p.*, k.nazwa as kategoria_nazwa FROM produkty p 
                  LEFT JOIN kategorie k ON p.kategoria_id = k.id 
                  WHERE p.id = $product_id";
$product = get_product($product_query);

// If product not found, show 404 page
if (!$product) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Page title
$page_title = $product['nazwa'];

// Get product images
$images_query = "SELECT * FROM zdjecia_produktow WHERE produkt_id = $product_id ORDER BY kolejnosc";
$images_result = mysqli_query($conn, $images_query);
$images = array();

if ($images_result && mysqli_num_rows($images_result) > 0) {
    while ($row = mysqli_fetch_assoc($images_result)) {
        $images[] = $row;
    }
}

// If no additional images, use main image
if (empty($images) && !empty($product['zdjecie_glowne'])) {
    $images[] = array('nazwa_pliku' => $product['zdjecie_glowne']);
}

// Get related products
$related_query = "SELECT * FROM produkty 
                 WHERE kategoria_id = {$product['kategoria_id']} 
                 AND id != $product_id 
                 AND dostepny = 1 
                 ORDER BY RAND() 
                 LIMIT 4";
$related_products = get_products($related_query);

// Update product view count
$update_views = "UPDATE produkty SET wyswietlenia = wyswietlenia + 1 WHERE id = $product_id";
mysqli_query($conn, $update_views);

// Include header
include 'header.php';
?>

<div class="container">
    <ul class="breadcrumbs">
        <li><a href="index.php">Strona Główna</a></li>
        <li><a href="categories.php">Kategorie</a></li>
        <li><a href="category.php?id=<?php echo $product['kategoria_id']; ?>"><?php echo $product['kategoria_nazwa']; ?></a></li>
        <li><?php echo $product['nazwa']; ?></li>
    </ul>
    
    <div class="product-detail">
        <div class="product-gallery">
            <div class="main-image" id="main-product-image" style="background-image: url('<?php echo !empty($product['zdjecie_glowne']) ? 'images/products/' . $product['zdjecie_glowne'] : '/api/placeholder/600/400'; ?>')"></div>
            
            <?php if (count($images) > 1): ?>
            <div class="thumbnails">
                <?php foreach ($images as $index => $image): ?>
                <div class="thumbnail <?php echo $index === 0 ? 'active' : ''; ?>" 
                     data-image="<?php echo 'images/products/' . $image['nazwa_pliku']; ?>" 
                     style="background-image: url('<?php echo 'images/products/' . $image['nazwa_pliku']; ?>')"></div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        
        <div class="product-content">
            <h1><?php echo $product['nazwa']; ?></h1>
            <div class="product-meta">
                <span><strong>Producent:</strong> <?php echo $product['producent']; ?></span>
                <?php if (!empty($product['kaliber'])): ?>
                <span><strong>Kaliber:</strong> <?php echo $product['kaliber']; ?></span>
                <?php endif; ?>
                <?php if (!empty($product['typ'])): ?>
                <span><strong>Typ:</strong> <?php echo $product['typ']; ?></span>
                <?php endif; ?>
            </div>
            <div class="product-detail-price"><?php echo format_price($product['cena']); ?></div>
            <div class="product-description">
                <?php echo $product['opis']; ?>
                
                <?php if (!empty($product['specyfikacja'])): ?>
                <div class="product-specifications">
                    <h3>Dane techniczne:</h3>
                    <?php echo $product['specyfikacja']; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if ($product['ilosc_na_stanie'] > 0): ?>
            <div class="add-to-cart">
                <div class="quantity">
                    <button class="quantity-btn minus">-</button>
                    <input type="number" id="product-quantity" value="1" min="1" max="<?php echo $product['ilosc_na_stanie']; ?>">
                    <button class="quantity-btn plus">+</button>
                </div>
                <button class="btn add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">Dodaj do koszyka</button>
            </div>
            <?php endif; ?>
            
            <div class="stock-info <?php echo get_stock_status_class($product['ilosc_na_stanie']); ?>">
                <?php echo get_stock_message($product['ilosc_na_stanie']); ?>
            </div>
        </div>
    </div>
    
    <?php if (!empty($related_products)): ?>
    <div class="related-products">
        <h2 class="section-title">Podobne produkty</h2>
        <div class="products-grid">
            <?php foreach ($related_products as $related): ?>
            <div class="product-card">
                <a href="product.php?id=<?php echo $related['id']; ?>" class="product-img" style="background-image: url('<?php echo !empty($related['zdjecie_glowne']) ? 'images/products/' . $related['zdjecie_glowne'] : '/api/placeholder/300/200'; ?>')"></a>
                <div class="product-info">
                    <h3 class="product-title"><a href="product.php?id=<?php echo $related['id']; ?>"><?php echo $related['nazwa']; ?></a></h3>
                    <p class="product-producer"><?php echo $related['producent']; ?></p>
                    <div class="product-price"><?php echo format_price($related['cena']); ?></div>
                    <div class="product-actions">
                        <button class="btn add-to-cart-btn" data-product-id="<?php echo $related['id']; ?>">Dodaj do koszyka</button>
                        <div class="stock-info <?php echo get_stock_status_class($related['ilosc_na_stanie']); ?>">
                            <?php echo get_stock_message($related['ilosc_na_stanie']); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Thumbnail gallery functionality
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('main-product-image');
        
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Remove active class from all thumbnails
                thumbnails.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked thumbnail
                this.classList.add('active');
                
                // Update main image
                const imagePath = this.getAttribute('data-image');
                mainImage.style.backgroundImage = `url('${imagePath}')`;
            });
        });
        
        // Quantity buttons functionality
        const minusBtn = document.querySelector('.quantity-btn.minus');
        const plusBtn = document.querySelector('.quantity-btn.plus');
        const quantityInput = document.getElementById('product-quantity');
        
        if (minusBtn && plusBtn && quantityInput) {
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });
            
            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                let maxValue = parseInt(quantityInput.getAttribute('max'));
                if (currentValue < maxValue) {
                    quantityInput.value = currentValue + 1;
                }
            });
            
            // Ensure quantity is valid when manually entered
            quantityInput.addEventListener('change', function() {
                let currentValue = parseInt(this.value);
                let minValue = parseInt(this.getAttribute('min'));
                let maxValue = parseInt(this.getAttribute('max'));
                
                if (isNaN(currentValue) || currentValue < minValue) {
                    this.value = minValue;
                } else if (currentValue > maxValue) {
                    this.value = maxValue;
                }
            });
        }
    });
</script>

<?php
// Include footer
include 'footer.php';
?>