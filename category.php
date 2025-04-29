<?php
// Include necessary files
include 'db_connection.php';
include 'functions.php';

// Get category ID from URL
$category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// If no category ID provided, redirect to categories page
if ($category_id === 0) {
    header('Location: categories.php');
    exit;
}

// Get category info
$category_query = "SELECT * FROM kategorie WHERE id = $category_id";
$category = get_category($category_query);

// If category not found, show 404 page
if (!$category) {
    header('HTTP/1.0 404 Not Found');
    include '404.php';
    exit;
}

// Page title
$page_title = $category['nazwa'];

// Get all products in this category
$products_query = "SELECT * FROM produkty WHERE kategoria_id = $category_id AND dostepny = 1";

// Apply filters if set
$where_clauses = array();
$where_clauses[] = "kategoria_id = $category_id";
$where_clauses[] = "dostepny = 1";

// Producer filter
if (isset($_GET['producer']) && !empty($_GET['producer'])) {
    $producer = sanitize_input($_GET['producer']);
    $where_clauses[] = "producent = '$producer'";
}

// Type filter (only for certain categories like 'Broń Biała')
if (isset($_GET['type']) && !empty($_GET['type'])) {
    $type = sanitize_input($_GET['type']);
    $where_clauses[] = "typ = '$type'";
}

// Build WHERE clause
$where_clause = implode(' AND ', $where_clauses);
$products_query = "SELECT * FROM produkty WHERE $where_clause";

// Apply sorting if set
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'price_asc':
            $products_query .= " ORDER BY cena ASC";
            break;
        case 'price_desc':
            $products_query .= " ORDER BY cena DESC";
            break;
        case 'popular':
            $products_query .= " ORDER BY popularnosc DESC";
            break;
        case 'newest':
            $products_query .= " ORDER BY data_dodania DESC";
            break;
        default:
            $products_query .= " ORDER BY nazwa ASC";
            break;
    }
} else {
    // Default sorting
    $products_query .= " ORDER BY nazwa ASC";
}

// Get products
$products = get_products($products_query);

// Get all producers for filter
$producers_query = "SELECT DISTINCT producent FROM produkty WHERE kategoria_id = $category_id AND dostepny = 1 ORDER BY producent";
$producers_result = mysqli_query($conn, $producers_query);
$producers = array();
while ($row = mysqli_fetch_assoc($producers_result)) {
    $producers[] = $row['producent'];
}

// Get all types for filter (if applicable)
$types = array();
$types_query = "SELECT DISTINCT typ FROM produkty WHERE kategoria_id = $category_id AND dostepny = 1 AND typ IS NOT NULL AND typ != '' ORDER BY typ";
$types_result = mysqli_query($conn, $types_query);
if ($types_result && mysqli_num_rows($types_result) > 0) {
    while ($row = mysqli_fetch_assoc($types_result)) {
        if (!empty($row['typ'])) {
            $types[] = $row['typ'];
        }
    }
}

// Include header
include 'header.php';
?>

<div class="container">
    <ul class="breadcrumbs">
        <li><a href="index.php">Strona Główna</a></li>
        <li><a href="categories.php">Kategorie</a></li>
        <li><?php echo $category['nazwa']; ?></li>
    </ul>
    
    <div class="products-header">
        <h1><?php echo $category['nazwa']; ?></h1>
        <div class="products-filters">
            <select class="filter-select" id="sort-select">
                <option value="">Sortuj wg</option>
                <option value="price_asc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_asc') echo 'selected'; ?>>Cena: rosnąco</option>
                <option value="price_desc" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'price_desc') echo 'selected'; ?>>Cena: malejąco</option>
                <option value="popular" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'popular') echo 'selected'; ?>>Popularność</option>
                <option value="newest" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'newest') echo 'selected'; ?>>Najnowsze</option>
            </select>
            
            <select class="filter-select" id="producer-select">
                <option value="">Producent</option>
                <?php foreach ($producers as $producer): ?>
                <option value="<?php echo $producer; ?>" <?php if(isset($_GET['producer']) && $_GET['producer'] == $producer) echo 'selected'; ?>><?php echo $producer; ?></option>
                <?php endforeach; ?>
            </select>
            
            <?php if (!empty($types)): ?>
            <select class="filter-select" id="type-select">
                <option value="">Typ</option>
                <?php foreach ($types as $type): ?>
                <option value="<?php echo $type; ?>" <?php if(isset($_GET['type']) && $_GET['type'] == $type) echo 'selected'; ?>><?php echo $type; ?></option>
                <?php endforeach; ?>
            </select>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="category-description">
        <?php echo $category['opis']; ?>
    </div>
    
    <?php if (empty($products)): ?>
    <div class="no-products">
        <p>Brak produktów w tej kategorii.</p>
    </div>
    <?php else: ?>
    <div class="products-grid">
        <?php foreach ($products as $product): ?>
        <div class="product-card">
            <a href="product.php?id=<?php echo $product['id']; ?>" class="product-img" style="background-image: url('<?php echo !empty($product['zdjecie_glowne']) ? 'images/products/' . $product['zdjecie_glowne'] : '/api/placeholder/300/200'; ?>')"></a>
            <div class="product-info">
                <h3 class="product-title"><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['nazwa']; ?></a></h3>
                <p class="product-producer"><?php echo $product['producent']; ?><?php echo !empty($product['typ']) ? ' | ' . $product['typ'] : ''; ?></p>
                <div class="product-price"><?php echo format_price($product['cena']); ?></div>
                <div class="product-actions">
                    <button class="btn add-to-cart-btn" data-product-id="<?php echo $product['id']; ?>">Dodaj do koszyka</button>
                    <div class="stock-info <?php echo get_stock_status_class($product['ilosc_na_stanie']); ?>">
                        <?php echo get_stock_message($product['ilosc_na_stanie']); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script>
    // Filter form handling
    document.addEventListener('DOMContentLoaded', function() {
        const sortSelect = document.getElementById('sort-select');
        const producerSelect = document.getElementById('producer-select');
        const typeSelect = document.getElementById('type-select');
        
        const applyFilters = function() {
            let url = window.location.href.split('?')[0] + '?id=<?php echo $category_id; ?>';
            
            if (sortSelect.value) {
                url += '&sort=' + sortSelect.value;
            }
            
            if (producerSelect.value) {
                url += '&producer=' + encodeURIComponent(producerSelect.value);
            }
            
            if (typeSelect && typeSelect.value) {
                url += '&type=' + encodeURIComponent(typeSelect.value);
            }
            
            window.location.href = url;
        };
        
        sortSelect.addEventListener('change', applyFilters);
        producerSelect.addEventListener('change', applyFilters);
        
        if (typeSelect) {
            typeSelect.addEventListener('change', applyFilters);
        }
    });
</script>

<?php
// Include footer
include 'footer.php';
?>