<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Include necessary files if not already included
if (!function_exists('get_cart_count')) {
    include_once 'functions.php';
}

// Get cart count
$cart_count = get_cart_count();

// Set default page title if not set
if (!isset($page_title)) {
    $page_title = get_page_title();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo">
                Military<span>Shop</span>
            </a>
            
            <ul class="nav-menu">
                <li><a href="index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Strona Główna</a></li>
                <li><a href="categories.php" <?php if(basename($_SERVER['PHP_SELF']) == 'categories.php' || basename($_SERVER['PHP_SELF']) == 'category.php') echo 'class="active"'; ?>>Kategorie</a></li>
                <li><a href="about.php" <?php if(basename($_SERVER['PHP_SELF']) == 'about.php') echo 'class="active"'; ?>>O Nas</a></li>
                <li><a href="contact.php" <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'class="active"'; ?>>Kontakt</a></li>
            </ul>
            
            <div class="nav-icons">
                <div class="nav-icon">
                    <a href="search.php" title="Wyszukaj">
                        <i>&#128269;</i>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="<?php echo is_logged_in() ? 'account.php' : 'login.php'; ?>" title="<?php echo is_logged_in() ? 'Moje konto' : 'Zaloguj się'; ?>">
                        <i>&#128100;</i>
                    </a>
                </div>
                <div class="nav-icon">
                    <a href="cart.php" title="Koszyk">
                        <i>&#128722;</i>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    </a>
                </div>
            </div>
        </div>
    </header>