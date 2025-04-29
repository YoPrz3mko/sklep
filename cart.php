<?php
// Start session
session_start();

// Include necessary files
include 'db_connection.php';
include 'functions.php';

// Page title
$page_title = 'Koszyk';

// Process cart actions
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    
    // Initialize cart if not exists
    if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Add product to cart
    if ($action === 'add') {
        $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        // Validate quantity
        if ($quantity <= 0) {
            $quantity = 1;
        }
        
        // Get product info
        $product_query = "SELECT * FROM produkty WHERE id = $product_id AND dostepny = 1";
        $product = get_product($product_query);
        
        if ($product) {
            // Check if product already in cart
            $found = false;
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    // Update quantity
                    $_SESSION['cart'][$key]['quantity'] += $quantity;
                    
                    // Check if quantity exceeds stock
                    if ($_SESSION['cart'][$key]['quantity'] > $product['ilosc_na_stanie']) {
                        $_SESSION['cart'][$key]['quantity'] = $product['ilosc_na_stanie'];
                    }
                    
                    $found = true;
                    break;
                }
            }
            
            // If product not in cart, add it
            if (!$found) {
                // Limit quantity to available stock
                if ($quantity > $product['ilosc_na_stanie']) {
                    $quantity = $product['ilosc_na_stanie'];
                }
                
                $_SESSION['cart'][] = array(
                    'id' => $product_id,
                    'name' => $product['nazwa'],
                    'price' => $product['cena'],
                    'quantity' => $quantity,
                    'image' => $product['zdjecie_glowne']
                );
            }
            
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => true,
                'message' => 'Produkt dodany do koszyka.',
                'cart_count' => get_cart_count()
            ));
            exit;
        } else {
            // Product not found
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => false,
                'message' => 'Produkt nie istnieje lub jest niedostępny.'
            ));
            exit;
        }
    }
    
    // Update cart quantity
    else if ($action === 'update') {
        $cart_index = isset($_POST['cart_index']) ? (int)$_POST['cart_index'] : -1;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        // Validate quantity
        if ($quantity <= 0) {
            $quantity = 1;
        }
        
        if ($cart_index >= 0 && isset($_SESSION['cart'][$cart_index])) {
            $product_id = $_SESSION['cart'][$cart_index]['id'];
            
            // Get product info to check stock
            $product_query = "SELECT ilosc_na_stanie FROM produkty WHERE id = $product_id";
            $product = get_product($product_query);
            
            if ($product) {
                // Limit quantity to available stock
                if ($quantity > $product['ilosc_na_stanie']) {
                    $quantity = $product['ilosc_na_stanie'];
                }
                
                $_SESSION['cart'][$cart_index]['quantity'] = $quantity;
            }
            
            // Calculate new totals
            $item_total = $_SESSION['cart'][$cart_index]['price'] * $quantity;
            $cart_total = get_cart_total();
            
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => true,
                'item_total' => format_price($_SESSION['cart'][$cart_index]['price'] * $quantity),
                'cart_total' => format_price($cart_total),
                'cart_count' => get_cart_count()
            ));
            exit;
        } else {
            // Invalid cart index
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => false,
                'message' => 'Nieprawidłowy indeks koszyka.'
            ));
            exit;
        }
    }
    
    // Remove from cart
    else if ($action === 'remove') {
        $cart_index = isset($_POST['cart_index']) ? (int)$_POST['cart_index'] : -1;
        
        if ($cart_index >= 0 && isset($_SESSION['cart'][$cart_index])) {
            array_splice($_SESSION['cart'], $cart_index, 1);
            
            // Calculate new total
            $cart_total = get_cart_total();
            
            // Return JSON response
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => true,
                'cart_total' => format_price($cart_total),
                'cart_count' => get_cart_count()
            ));
            exit;
        } else {
            // Invalid cart index
            header('Content-Type: application/json');
            echo json_encode(array(
                'success' => false,
                'message' => 'Nieprawidłowy indeks koszyka.'
            ));
            exit;
        }
    }
    
    // Clear cart
    else if ($action === 'clear') {
        $_SESSION['cart'] = array();
        
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode(array(
            'success' => true,
            'message' => 'Koszyk został wyczyszczony.',
            'cart_count' => 0
        ));
        exit;
    }
}

// Include header
include 'header.php';
?>

<div class="container">
    <h1 class="page-title">Koszyk</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
    <div class="empty-cart">
        <p>Twój koszyk jest pusty.</p>
        <a href="categories.php" class="btn">Kontynuuj zakupy</a>
    </div>
    <?php else: ?>
    <div class="cart-container">
        <div class="cart-items">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produkt</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Razem</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $index => $item): ?>
                    <tr class="cart-item" data-index="<?php echo $index; ?>">
                        <td class="cart-product">
                            <div class="cart-product-info">
                                <img src="<?php echo !empty($item['image']) ? 'images/products/' . $item['image'] : '/api/placeholder/100/100'; ?>" alt="<?php echo $item['name']; ?>">
                                <div>
                                    <h3><a href="product.php?id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h3>
                                </div>
                            </div>
                        </td>
                        <td class="cart-price"><?php echo format_price($item['price']); ?></td>
                        <td class="cart-quantity">
                            <div class="quantity cart-quantity-controls">
                                <button class="quantity-btn minus">-</button>
                                <input type="number" class="cart-quantity-input" value="<?php echo $item['quantity']; ?>" min="1" 
                                       data-index="<?php echo $index; ?>" data-price="<?php echo $item['price']; ?>">
                                <button class="quantity-btn plus">+</button>
                            </div>
                        </td>
                        <td class="cart-item-total"><?php echo format_price($item['price'] * $item['quantity']); ?></td>
                        <td class="cart-remove">
                            <button class="remove-btn" title="Usuń z koszyka" data-index="<?php echo $index; ?>">✕</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <div class="cart-summary">
            <h2>Podsumowanie</h2>
            <div class="cart-total">
                <span>Łącznie:</span>
                <span class="cart-total-value"><?php echo format_price(get_cart_total()); ?></span>
            </div>
            <div class="cart-actions">
                <button id="clear-cart" class="btn btn-outline">Wyczyść koszyk</button>
                <a href="checkout.php" class="btn">Złóż zamówienie</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Quantity controls
        const quantityControls = document.querySelectorAll('.cart-quantity-controls');
        
        quantityControls.forEach(control => {
            const minusBtn = control.querySelector('.minus');
            const plusBtn = control.querySelector('.plus');
            const input = control.querySelector('input');
            
            minusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                if (currentValue > 1) {
                    input.value = currentValue - 1;
                    updateCartItem(input);
                }
            });
            
            plusBtn.addEventListener('click', function() {
                let currentValue = parseInt(input.value);
                input.value = currentValue + 1;
                updateCartItem(input);
            });
            
            input.addEventListener('change', function() {
                let currentValue = parseInt(this.value);
                if (isNaN(currentValue) || currentValue < 1) {
                    this.value = 1;
                }
                updateCartItem(this);
            });
        });
        
        // Remove item buttons
        const removeButtons = document.querySelectorAll('.remove-btn');
        
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                removeCartItem(index);
            });
        });
        
        // Clear cart button
        const clearCartBtn = document.getElementById('clear-cart');
        
        if (clearCartBtn) {
            clearCartBtn.addEventListener('click', function() {
                if (confirm('Czy na pewno chcesz wyczyścić koszyk?')) {
                    clearCart();
                }
            });
        }
        
        // Function to update cart item quantity
        function updateCartItem(input) {
            const index = input.getAttribute('data-index');
            const quantity = parseInt(input.value);
            
            // Send AJAX request
            const formData = new FormData();
            formData.append('action', 'update');
            formData.append('cart_index', index);
            formData.append('quantity', quantity);
            
            fetch('cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update item total
                    const row = input.closest('.cart-item');
                    row.querySelector('.cart-item-total').textContent = data.item_total;
                    
                    // Update cart total
                    document.querySelector('.cart-total-value').textContent = data.cart_total;
                    
                    // Update cart count in header
                    document.querySelector('.cart-count').textContent = data.cart_count;
                }
            })
            .catch(error => console.error('Error:', error));
        }
        
        // Function to remove cart item
        function removeCartItem(index) {
            // Send AJAX request
            const formData = new FormData();
            formData.append('action', 'remove');
            formData.append('cart_index', index);
            
            fetch('cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove item from DOM
                    const item = document.querySelector(`.cart-item[data-index="${index}"]`);
                    item.remove();
                    
                    // Update cart total
                    document.querySelector('.cart-total-value').textContent = data.cart_total;
                    
                    // Update cart count in header
                    document.querySelector('.cart-count').textContent = data.cart_count;
                    
                    // If cart is empty, reload page
                    if (data.cart_count === 0) {
                        location.reload();
                    }
                    
                    // Reindex remaining items
                    const cartItems = document.querySelectorAll('.cart-item');
                    cartItems.forEach((item, newIndex) => {
                        item.setAttribute('data-index', newIndex);
                        
                        const quantityInput = item.querySelector('.cart-quantity-input');
                        quantityInput.setAttribute('data-index', newIndex);
                        
                        const removeBtn = item.querySelector('.remove-btn');
                        removeBtn.setAttribute('data-index', newIndex);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        }
        
        // Function to clear cart
        function clearCart() {
            // Send AJAX request
            const formData = new FormData();
            formData.append('action', 'clear');
            
            fetch('cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Reload page
                    location.reload();
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>

<?php
// Include footer
include 'footer.php';
?>