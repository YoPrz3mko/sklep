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
                        <li><a href="index.php">Strona Główna</a></li>
                        <li><a href="about.php">O Nas</a></li>
                        <li><a href="categories.php">Produkty</a></li>
                        <li><a href="contact.php">Kontakt</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Kategorie</h3>
                    <ul class="footer-links">
                        <?php
                        $categories_query = "SELECT * FROM kategorie LIMIT 5";
                        $categories = get_categories($categories_query);
                        
                        foreach ($categories as $category) {
                            echo '<li><a href="category.php?id=' . $category['id'] . '">' . $category['nazwa'] . '</a></li>';
                        }
                        ?>
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
                <p>&copy; <?php echo date('Y'); ?> Military Shop. Wszystkie prawa zastrzeżone.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>