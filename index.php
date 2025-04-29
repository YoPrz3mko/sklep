<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Military Shop | Profesjonalny Sklep z Bronią</title>
    <style>
        :root {
            --primary: #2a3439;
            --secondary: #4a5559;
            --accent: #bf9b30;
            --light: #f5f5f5;
            --dark: #1a1a1a;
            --success: #28a745;
            --danger: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f0f2f5;
            color: var(--dark);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--accent);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #a88928;
            transform: translateY(-2px);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--accent);
            color: var(--accent);
        }

        .btn-outline:hover {
            background-color: var(--accent);
            color: white;
        }

        /* Header */
        header {
            background-color: var(--primary);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: white;
            display: flex;
            align-items: center;
        }

        .logo span {
            color: var(--accent);
        }

        .nav-menu {
            display: flex;
            list-style: none;
        }

        .nav-menu li {
            margin-left: 20px;
            position: relative;
        }

        .nav-menu a {
            color: white;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover, .nav-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--accent);
        }

        .nav-icons {
            display: flex;
            align-items: center;
        }

        .nav-icon {
            margin-left: 15px;
            font-size: 20px;
            cursor: pointer;
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Hero Section */
        .hero {
            background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/api/placeholder/1200/600');
            background-size: cover;
            background-position: center;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        /* Categories Section */
        .categories {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title:after {
            content: '';
            display: block;
            width: 80px;
            height: 3px;
            background-color: var(--accent);
            margin: 15px auto 0;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }

        .category-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .category-img {
            height: 200px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
        }

        .category-info {
            padding: 20px;
            text-align: center;
        }

        .category-info h3 {
            margin-bottom: 10px;
            font-size: 20px;
            color: var(--primary);
        }

        /* Products Section */
        .products {
            background-color: #f9f9f9;
            padding: 60px 0;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-img {
            height: 220px;
            background-color: #eee;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary);
        }

        .product-producer {
            color: var(--secondary);
            font-size: 14px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 22px;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 15px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
        }

        .stock-info {
            font-size: 14px;
            color: var(--success);
            display: flex;
            align-items: center;
        }

        .low-stock {
            color: var(--danger);
        }

        /* Footer */
        footer {
            background-color: var(--primary);
            color: white;
            padding: 60px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ccc;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            padding-top: 20px;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: #aaa;
            font-size: 14px;
        }

        /* Single Product Page */
        .product-detail {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            padding: 40px 0;
        }

        .product-gallery {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .main-image {
            width: 100%;
            height: 400px;
            background-color: #eee;
            margin-bottom: 20px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .thumbnails {
            display: flex;
            gap: 10px;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            background-color: #ddd;
            border-radius: 4px;
            cursor: pointer;
            background-size: cover;
            background-position: center;
        }

        .product-content h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .product-meta {
            color: var(--secondary);
            margin-bottom: 20px;
        }

        .product-meta span {
            display: inline-block;
            margin-right: 15px;
        }

        .product-detail-price {
            font-size: 32px;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .product-description {
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .add-to-cart {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }

        .quantity {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
        }

        .quantity button {
            background: #f0f0f0;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 16px;
        }

        .quantity input {
            width: 60px;
            text-align: center;
            border: none;
            font-size: 16px;
            padding: 10px 0;
        }

        /* Products List Page */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .products-filters {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .filter-select {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: white;
        }

        .breadcrumbs {
            display: flex;
            list-style: none;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .breadcrumbs li:not(:last-child):after {
            content: '›';
            margin: 0 8px;
            color: #aaa;
        }

        .breadcrumbs li:last-child {
            color: var(--accent);
            font-weight: 500;
        }

        /* For mobile devices */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .nav-menu {
                margin-top: 15px;
                width: 100%;
                flex-wrap: wrap;
            }
            
            .nav-menu li {
                margin-left: 0;
                margin-right: 15px;
                margin-bottom: 10px;
            }
            
            .nav-icons {
                margin-top: 15px;
            }
            
            .hero {
                height: 400px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .product-detail {
                grid-template-columns: 1fr;
            }
            
            .products-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .products-filters {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.html" class="logo">
                Military<span>Shop</span>
            </a>
            
            <ul class="nav-menu">
                <li><a href="index.html" class="active">Strona Główna</a></li>
                <li><a href="products.html">Kategorie</a></li>
                <li><a href="#">O Nas</a></li>
                <li><a href="#">Kontakt</a></li>
            </ul>
            
            <div class="nav-icons">
                <div class="nav-icon">
                    <i>&#128269;</i>
                </div>
                <div class="nav-icon">
                    <i>&#128100;</i>
                </div>
                <div class="nav-icon">
                    <i>&#128722;</i>
                    <span class="cart-count">0</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Page Content -->
    <section class="hero">
        <div class="hero-content">
            <h1>Profesjonalny Sklep z Bronią</h1>
            <p>Oferujemy najwyższej jakości broń i akcesoria dla profesjonalistów i pasjonatów militariów</p>
            <a href="products.html" class="btn">Przeglądaj Produkty</a>
        </div>
    </section>

    <section class="categories container">
        <h2 class="section-title">Kategorie Produktów</h2>
        <div class="categories-grid">
            <a href="category_long_guns.html" class="category-card">
                <div class="category-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="category-info">
                    <h3>Broń Długa</h3>
                    <p>Karabiny szturmowe, karabiny wyborowe i inne</p>
                </div>
            </a>
            <a href="#" class="category-card">
                <div class="category-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="category-info">
                    <h3>Broń Krótka</h3>
                    <p>Pistolety, rewolwery i inne</p>
                </div>
            </a>
            <a href="category_melee.html" class="category-card">
                <div class="category-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="category-info">
                    <h3>Broń Biała</h3>
                    <p>Noże taktyczne, składane i stałoostrzałowe</p>
                </div>
            </a>
            <a href="#" class="category-card">
                <div class="category-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="category-info">
                    <h3>Amunicja</h3>
                    <p>Różne kalibry i rodzaje</p>
                </div>
            </a>
            <a href="#" class="category-card">
                <div class="category-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="category-info">
                    <h3>Akcesoria</h3>
                    <p>Optyka, magazynki i inne</p>
                </div>
            </a>
        </div>
    </section>

    <section class="products container">
        <h2 class="section-title">Polecane Produkty</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">FN SCAR 16S</h3>
                    <p class="product-producer">FN Herstal</p>
                    <div class="product-price">2750.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 5</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Heckler & Koch HK416</h3>
                    <p class="product-producer">Heckler & Koch</p>
                    <div class="product-price">3500.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 4</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">CZ Bren 2 MS</h3>
                    <p class="product-producer">CZ</p>
                    <div class="product-price">2250.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 7</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Smith & Wesson M&P15 Sport II</h3>
                    <p class="product-producer">Smith & Wesson</p>
                    <div class="product-price">750.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 9</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Category Products Page (Broń Długa) -->
    <div id="category_page" style="display: none;">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="index.html">Strona Główna</a></li>
                <li><a href="products.html">Kategorie</a></li>
                <li>Broń Długa</li>
            </ul>
            
            <div class="products-header">
                <h1>Broń Długa</h1>
                <div class="products-filters">
                    <select class="filter-select">
                        <option>Sortuj wg</option>
                        <option>Cena: rosnąco</option>
                        <option>Cena: malejąco</option>
                        <option>Popularność</option>
                    </select>
                    <select class="filter-select">
                        <option>Producent</option>
                        <option>FN Herstal</option>
                        <option>Smith & Wesson</option>
                        <option>Heckler & Koch</option>
                        <option>Steyr</option>
                        <option>CZ</option>
                    </select>
                </div>
            </div>
            
            <div class="products-grid">
                <div class="product-card">
                    <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                    <div class="product-info">
                        <h3 class="product-title">FN SCAR 16S</h3>
                        <p class="product-producer">FN Herstal</p>
                        <div class="product-price">2750.00 zł</div>
                        <div class="product-actions">
                            <button class="btn">Dodaj do koszyka</button>
                            <div class="stock-info">W magazynie: 5</div>
                        </div>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                    <div class="product-info">
                        <h3 class="product-title">Smith & Wesson M&P15 Sport II</h3>
                        <p class="product-producer">Smith & Wesson</p>
                        <div class="product-price">750.00 zł</div>
                        <div class="product-actions">
                            <button class="btn">Dodaj do koszyka</button>
                            <div class="stock-info">W magazynie: 9</div>
                        </div>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                    <div class="product-info">
                        <h3 class="product-title">Heckler & Koch HK416</h3>
                        <p class="product-producer">Heckler & Koch</p>
                        <div class="product-price">3500.00 zł</div>
                        <div class="product-actions">
                            <button class="btn">Dodaj do koszyka</button>
                            <div class="stock-info">W magazynie: 4</div>
                        </div>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                    <div class="product-info">
                        <h3 class="product-title">Steyr AUG A3 M1</h3>
                        <p class="product-producer">Steyr</p>
                        <div class="product-price">2750.00 zł</div>
                        <div class="product-actions">
                            <button class="btn">Dodaj do koszyka</button>
                            <div class="stock-info">W magazynie: 6</div>
                        </div>
                    </div>
                </div>
                
                <div class="product-card">
                    <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                    <div class="product-info">
                        <h3 class="product-title">CZ Bren 2 MS</h3>
                        <p class="product-producer">CZ</p>
                        <div class="product-price">2250.00 zł</div>
                        <div class="product-actions">
                            <button class="btn">Dodaj do koszyka</button>
                            <div class="stock-info">W magazynie: 7</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Single Product Page Template -->
    <div id="product_detail" style="display: none;">
        <div class="container">
            <ul class="breadcrumbs">
                <li><a href="index.html">Strona Główna</a></li>
                <li><a href="products.html">Kategorie</a></li>
                <li><a href="category_long_guns.html">Broń Długa</a></li>
                <li>FN SCAR 16S</li>
            </ul>
            
            <div class="product-detail">
                <div class="product-gallery">
                    <div class="main-image" style="background-image: url('/api/placeholder/600/400')"></div>
                    <div class="thumbnails">
                        <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                        <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                        <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                    </div>
                </div>
                
                <div class="product-content">
                    <h1>FN SCAR 16S</h1>
                    <div class="product-meta">
                        <span><strong>Producent:</strong> FN Herstal</span>
                        <span><strong>Kaliber:</strong> 5.56x45mm NATO</span>
                    </div>
                    <div class="product-detail-price">2750.00 zł</div>
                    <div class="product-description">
                        <p>Karabin szturmowy o nowoczesnej konstrukcji. Jest uznawany za jeden z najlepszych karabinów szturmowych, ceniony przez wojsko i jednostki specjalne na całym świecie.</p>
                        <p><strong>Dane techniczne:</strong></p>
                        <ul>
                            <li>Długość lufy: 16 cala (406 mm)</li>
                            <li>Waga: 8.2 lbs (3.7 kg)</li>
                            <li>Pojemność magazynka: 30 naboi</li>
                        </ul>
                    </div>
                    <div class="add-to-cart">
                        <div class="quantity">
                            <button>-</button>
                            <input type="text" value="1">
                            <button>+</button>
                        </div>
                        <button class="btn">Dodaj do koszyka</button>
                    </div>
                    <div class="stock-info">W magazynie: 5 szt.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Broń Biała Category Page Template -->
<div id="category_melee" style="display: none;">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="index.html">Strona Główna</a></li>
            <li><a href="products.html">Kategorie</a></li>
            <li>Broń Biała</li>
        </ul>
        
        <div class="products-header">
            <h1>Broń Biała</h1>
            <div class="products-filters">
                <select class="filter-select">
                    <option>Sortuj wg</option>
                    <option>Cena: rosnąco</option>
                    <option>Cena: malejąco</option>
                    <option>Popularność</option>
                </select>
                <select class="filter-select">
                    <option>Producent</option>
                    <option>Ka-Bar</option>
                    <option>Cold Steel</option>
                    <option>Benchmade</option>
                    <option>ESEE</option>
                    <option>Spyderco</option>
                </select>
                <select class="filter-select">
                    <option>Typ</option>
                    <option>Nóż składany</option>
                    <option>Nóż stałoostrzałowy</option>
                </select>
            </div>
        </div>
        
        <div class="products-grid">
            <!-- Products from the database -->
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Ka-Bar TDI Law Enforcement Knife</h3>
                    <p class="product-producer">Ka-Bar | Nóż składany</p>
                    <div class="product-price">60.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 20</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Cold Steel Recon 1</h3>
                    <p class="product-producer">Cold Steel | Nóż składany</p>
                    <div class="product-price">75.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 18</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Benchmade Griptilian 551</h3>
                    <p class="product-producer">Benchmade | Nóż składany</p>
                    <div class="product-price">135.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 15</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">ESEE 4P</h3>
                    <p class="product-producer">ESEE | Nóż stałoostrzałowy</p>
                    <div class="product-price">115.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 12</div>
                    </div>
                </div>
            </div>
            
            <div class="product-card">
                <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                <div class="product-info">
                    <h3 class="product-title">Spyderco Paramilitary 2</h3>
                    <p class="product-producer">Spyderco | Nóż składany</p>
                    <div class="product-price">175.00 zł</div>
                    <div class="product-actions">
                        <button class="btn">Dodaj do koszyka</button>
                        <div class="stock-info">W magazynie: 10</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Single Product Page Example for Broń Biała -->
<div id="product_detail_melee" style="display: none;">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="index.html">Strona Główna</a></li>
            <li><a href="products.html">Kategorie</a></li>
            <li><a href="category_melee.html">Broń Biała</a></li>
            <li>Spyderco Paramilitary 2</li>
        </ul>
        
        <div class="product-detail">
            <div class="product-gallery">
                <div class="main-image" style="background-image: url('/api/placeholder/600/400')"></div>
                <div class="thumbnails">
                    <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="thumbnail" style="background-image: url('/api/placeholder/100/100')"></div>
                </div>
            </div>
            
            <div class="product-content">
                <h1>Spyderco Paramilitary 2</h1>
                <div class="product-meta">
                    <span><strong>Producent:</strong> Spyderco</span>
                    <span><strong>Typ:</strong> Nóż składany</span>
                    <span><strong>Długość:</strong> 21.00 cm</span>
                </div>
                <div class="product-detail-price">175.00 zł</div>
                <div class="product-description">
                    <p>Jeden z najbardziej cenionych noży wśród miłośników broni białej i survivalu. Jest ergonomiczny, wytrzymały i zapewnia wygodny chwyt.</p>
                    <p><strong>Dane techniczne:</strong></p>
                    <ul>
                        <li>Długość całkowita: 8.28 cala (210 mm)</li>
                        <li>Długość ostrza: 3.44 cala (87 mm)</li>
                        <li>Waga: 3.75 oz (106 g)</li>
                    </ul>
                </div>
                <div class="add-to-cart">
                    <div class="quantity">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                    <button class="btn">Dodaj do koszyka</button>
                </div>
                <div class="stock-info">W magazynie: 10 szt.</div>
            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>Military Shop</h3>
                    <p>Specjaliści w branży militarnej od 2005 roku. Oferujemy najwyższej jakości broń i akcesoria dla profesjonalistów i pasjonatów.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Linki</h3>
                    <ul class="footer-links">
                        <li><a href="#">Strona Główna</a></li>
                        <li><a href="#">O Nas</a></li>
                        <li><a href="#">Produkty</a></li>
                        <li><a href="#">Kontakt</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Kategorie</h3>
                    <ul class="footer-links">
                        <li><a href="#">Broń Długa</a></li>
                        <li><a href="#">Broń Krótka</a></li>
                        <li><a href="#">Broń Biała</a></li>
                        <li><a href="#">Amunicja</a></li>
                        <li><a href="#">Akcesoria</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Kontakt</h3>
                    <ul class="footer-links">
                        <li>Email: kontakt@militaryshop.pl</li>
                        <li>Telefon: +48 123 456 789</li>
                        <li>Adres: ul. Wojskowa 15, 00-001 Warszawa</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Military Shop. Wszystkie prawa zastrzeżone.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sample code to toggle between page views (for demo purposes)
            const urlParams = new URLSearchParams(window.location.search);
            const page = urlParams.get('page');
            
            if (page === 'category') {
                document.querySelector('.hero').style.display = 'none';
                document.querySelector('.categories').style.display = 'none';
                document.querySelector('.products').style.display = 'none';
                document.getElementById('category_page').style.display = 'block';
            } else if (page === 'product') {
                document.querySelector('.hero').style.display = 'none';
                document.querySelector('.categories').style.display = 'none';
                document.querySelector('.products').style.display = 'none';
                document.getElementById('product_detail').style.display = 'block';
            }// Cart functionality
            const cartCount = document.querySelector('.cart-count');
            const addToCartButtons = document.querySelectorAll('.btn');
            
            let cartItems = [];
            
            addToCartButtons.forEach(button => {
                if (button.textContent === 'Dodaj do koszyka') {
                    button.addEventListener('click', function() {
                        const productCard = this.closest('.product-card') || this.closest('.product-content');
                        let productTitle, productPrice, productQuantity = 1;
                        
                        if (productCard.classList.contains('product-card')) {
                            productTitle = productCard.querySelector('.product-title').textContent;
                            productPrice = parseFloat(productCard.querySelector('.product-price').textContent);
                        } else {
                            productTitle = productCard.querySelector('h1').textContent;
                            productPrice = parseFloat(productCard.querySelector('.product-detail-price').textContent);
                            const quantityInput = productCard.querySelector('.quantity input');
                            if (quantityInput) {
                                productQuantity = parseInt(quantityInput.value);
                            }
                        }
                        
                        // Check if product already in cart
                        const existingItemIndex = cartItems.findIndex(item => item.title === productTitle);
                        
                        if (existingItemIndex > -1) {
                            cartItems[existingItemIndex].quantity += productQuantity;
                        } else {
                            cartItems.push({
                                title: productTitle,
                                price: productPrice,
                                quantity: productQuantity
                            });
                        }
                        
                        // Update cart count
                        updateCartCount();
                        
                        // Show notification
                        showNotification(`${productTitle} dodany do koszyka`);
                    });
                }
            });
            
            function updateCartCount() {
                const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
                cartCount.textContent = totalItems;
            }
            
            function showNotification(message) {
                const notification = document.createElement('div');
                notification.classList.add('notification');
                notification.textContent = message;
                
                // Style the notification
                notification.style.position = 'fixed';
                notification.style.bottom = '20px';
                notification.style.right = '20px';
                notification.style.backgroundColor = 'var(--accent)';
                notification.style.color = 'white';
                notification.style.padding = '10px 20px';
                notification.style.borderRadius = '4px';
                notification.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
                notification.style.zIndex = '1000';
                
                document.body.appendChild(notification);
                
                // Remove after 3 seconds
                setTimeout(() => {
                    notification.style.opacity = '0';
                    notification.style.transition = 'opacity 0.5s ease';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 500);
                }, 3000);
            }
            
            // Quantity buttons functionality
            const quantityContainer = document.querySelector('.quantity');
            if (quantityContainer) {
                const minusBtn = quantityContainer.querySelector('button:first-child');
                const plusBtn = quantityContainer.querySelector('button:last-child');
                const quantityInput = quantityContainer.querySelector('input');
                
                minusBtn.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });
                
                plusBtn.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                });
            }
            
            // Function to generate all product cards from PHP data
            function generateProductCards(products) {
                const productsGrid = document.querySelector('.products-grid');
                
                products.forEach(product => {
                    const productCard = document.createElement('div');
                    productCard.classList.add('product-card');
                    
                    // Determine stock status class
                    const stockClass = product.ilosc_na_stanie <= 5 ? 'low-stock' : '';
                    
                    productCard.innerHTML = `
                        <div class="product-img" style="background-image: url('/api/placeholder/300/200')"></div>
                        <div class="product-info">
                            <h3 class="product-title">${product.nazwa}</h3>
                            <p class="product-producer">${product.producent}</p>
                            <div class="product-price">${product.cena} zł</div>
                            <div class="product-actions">
                                <button class="btn">Dodaj do koszyka</button>
                                <div class="stock-info ${stockClass}">W magazynie: ${product.ilosc_na_stanie}</div>
                            </div>
                        </div>
                    `;
                    
                    productsGrid.appendChild(productCard);
                });
                document.addEventListener('DOMContentLoaded', function() {
    // Type filter functionality
    const typeFilter = document.querySelector('.filter-select:nth-child(3)');
    if (typeFilter) {
        typeFilter.addEventListener('change', function() {
            const selectedType = this.value;
            const productCards = document.querySelectorAll('.product-card');
            
            if (selectedType === "Typ") {
                // Show all products if "Typ" (default option) is selected
                productCards.forEach(card => {
                    card.style.display = 'block';
                });
            } else {
                // Filter products by type
                productCards.forEach(card => {
                    const productType = card.querySelector('.product-producer').textContent;
                    if (productType.includes(selectedType)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });
    }
});
            }
            
            // PHP Integration (to be implemented in separate PHP files)
            /*
            <?php
            // index.php - Main page
            include 'db_connection.php';
            include 'functions.php';
            
            // Get featured products (e.g., 4 random products from any category)
            $featured_products_query = "SELECT * FROM produkty ORDER BY RAND() LIMIT 4";
            $featured_products = get_products($featured_products_query);
            
            // Get all categories
            $categories_query = "SELECT * FROM kategorie";
            $categories = get_categories($categories_query);
            
            include 'header.php';
            include 'homepage_content.php';
            include 'footer.php';
            ?>
            
            <?php
            // category.php - Category page
            include 'db_connection.php';
            include 'functions.php';
            
            // Get category ID from URL
            $category_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            
            // Get category info
            $category_query = "SELECT * FROM kategorie WHERE id = $category_id";
            $category = get_category($category_query);
            
            // Get all products in this category
            $products_query = "SELECT * FROM produkty WHERE kategoria_id = $category_id";
            
            // Apply sorting if needed
            if (isset($_GET['sort'])) {
                switch ($_GET['sort']) {
                    case 'price_asc':
                        $products_query .= " ORDER BY cena ASC";
                        break;
                    case 'price_desc':
                        $products_query .= " ORDER BY cena DESC";
                        break;
                    case 'popular':
                        $products_query .= " ORDER BY views DESC";
                        break;
                }
            }
            
            $products = get_products($products_query);
            
            include 'header.php';
            include 'category_content.php';
            include 'footer.php';
            ?>
            
            <?php
            // product.php - Product detail page
            include 'db_connection.php';
            include 'functions.php';
            
            // Get product ID from URL
            $product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            
            // Get product info
            $product_query = "SELECT * FROM produkty WHERE id = $product_id";
            $product = get_product($product_query);
            
            // Get related products
            $related_query = "SELECT * FROM produkty WHERE kategoria_id = {$product['kategoria_id']} AND id != $product_id LIMIT 4";
            $related_products = get_products($related_query);
            
            include 'header.php';
            include 'product_content.php';
            include 'footer.php';
            ?>
            
            <?php
            // functions.php - Helper functions
            function get_products($query) {
                global $conn;
                $result = mysqli_query($conn, $query);
                $products = array();
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $products[] = $row;
                }
                
                return $products;
            }
            
            function get_product($query) {
                global $conn;
                $result = mysqli_query($conn, $query);
                return mysqli_fetch_assoc($result);
            }
            
            function get_categories($query) {
                global $conn;
                $result = mysqli_query($conn, $query);
                $categories = array();
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $categories[] = $row;
                }
                
                return $categories;
            }
            
            function get_category($query) {
                global $conn;
                $result = mysqli_query($conn, $query);
                return mysqli_fetch_assoc($result);
            }
            ?>
            
            <?php
            // db_connection.php - Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "militaryshop";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            ?>
            */
        });
    </script>
</body>
</html>