<?php
// Helper functions for the Military Shop

/**
 * Get multiple products from the database
 *
 * @param string $query SQL query to fetch products
 * @return array Array of products
 */
function get_products($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    $products = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
    
    return $products;
}

/**
 * Get a single product from the database
 *
 * @param string $query SQL query to fetch a single product
 * @return array|null Product data or null if not found
 */
function get_product($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    return mysqli_fetch_assoc($result);
}

/**
 * Get multiple categories from the database
 *
 * @param string $query SQL query to fetch categories
 * @return array Array of categories
 */
function get_categories($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    $categories = array();
    
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    
    return $categories;
}

/**
 * Get a single category from the database
 *
 * @param string $query SQL query to fetch a single category
 * @return array|null Category data or null if not found
 */
function get_category($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    
    return mysqli_fetch_assoc($result);
}

/**
 * Format price with Polish currency
 *
 * @param float $price Price to format
 * @return string Formatted price
 */
function format_price($price) {
    return number_format($price, 2, ',', ' ') . ' zł';
}

/**
 * Get stock status class based on quantity
 *
 * @param int $stock Stock quantity
 * @return string CSS class for stock status
 */
function get_stock_status_class($stock) {
    if ($stock <= 0) {
        return 'out-of-stock';
    } elseif ($stock <= 5) {
        return 'low-stock';
    } else {
        return '';
    }
}

/**
 * Get stock message based on quantity
 *
 * @param int $stock Stock quantity
 * @return string Message about stock status
 */
function get_stock_message($stock) {
    if ($stock <= 0) {
        return 'Brak w magazynie';
    } else {
        return 'W magazynie: ' . $stock . ' szt.';
    }
}

/**
 * Sanitize user input
 *
 * @param string $data Data to sanitize
 * @return string Sanitized data
 */
function sanitize_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

/**
 * Check if user is logged in
 *
 * @return bool True if user is logged in, false otherwise
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Get total items in cart
 *
 * @return int Total items in cart
 */
function get_cart_count() {
    $count = 0;
    
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $count += $item['quantity'];
        }
    }
    
    return $count;
}

/**
 * Get total price of items in cart
 *
 * @return float Total price
 */
function get_cart_total() {
    $total = 0;
    
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
    }
    
    return $total;
}

/**
 * Generate page title
 *
 * @param string $title Specific page title
 * @return string Complete page title
 */
function get_page_title($title = '') {
    $base_title = 'Military Shop | Profesjonalny Sklep z Bronią';
    
    if (empty($title)) {
        return $base_title;
    } else {
        return $title . ' | ' . $base_title;
    }
}
?>