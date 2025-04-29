/**
 * Military Shop - Main JavaScript File
 */

document.addEventListener('DOMContentLoaded', function() {
    // Add to cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            let quantity = 1;
            
            // Check if there's a quantity input
            const quantityInput = document.getElementById('product-quantity');
            if (quantityInput) {
                quantity = parseInt(quantityInput.value);
            }
            
            addToCart(productId, quantity);
        });
    });
    
    // Function to add product to cart
    function addToCart(productId, quantity) {
        // Create form data
        const formData = new FormData();
        formData.append('action', 'add');
        formData.append('product_id', productId);
        formData.append('quantity', quantity);
        
        // Send AJAX request
        fetch('cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update cart count in header
                document.querySelector('.cart-count').textContent = data.cart_count;
                
                // Show notification
                showNotification(data.message);
            } else {
                // Show error notification
                showNotification(data.message, true);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showNotification('Wystąpił błąd podczas dodawania produktu do koszyka.', true);
        });
    }
    
    // Function to display notification
    function showNotification(message, isError = false) {
        const notification = document.createElement('div');
        notification.classList.add('notification');
        
        if (isError) {
            notification.classList.add('notification-error');
        }
        
        notification.textContent = message;
        
        // Style the notification
        notification.style.position = 'fixed';
        notification.style.bottom = '20px';
        notification.style.right = '20px';
        notification.style.backgroundColor = isError ? '#dc3545' : '#bf9b30';
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
    
    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.classList.toggle('active');
        });
    }
    
    // Search form functionality
    const searchIcon = document.querySelector('.nav-icons .nav-icon:first-child');
    const searchForm = document.querySelector('.search-form');
    
    if (searchIcon && searchForm) {
        searchIcon.addEventListener('click', function(e) {
            e.preventDefault();
            searchForm.classList.toggle('active');
        });
    }
    
    // Product image gallery
    const productThumbnails = document.querySelectorAll('.thumbnail');
    const mainProductImage = document.getElementById('main-product-image');
    
    if (productThumbnails.length > 0 && mainProductImage) {
        productThumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-image');
                mainProductImage.style.backgroundImage = `url('${imageUrl}')`;
                
                // Remove active class from all thumbnails
                productThumbnails.forEach(thumb => thumb.classList.remove('active'));
                
                // Add active class to clicked thumbnail
                this.classList.add('active');
            });
        });
    }
    
    // Back to top button
    const backToTopBtn = document.getElementById('back-to-top');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Newsletter form
    const newsletterForm = document.getElementById('newsletter-form');
    
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const emailInput = this.querySelector('input[type="email"]');
            const email = emailInput.value.trim();
            
            if (email === '') {
                showNotification('Proszę podać adres email.', true);
                return;
            }
            
            // Here you would normally send an AJAX request to subscribe the user
            // For this example, we'll just show a success message
            showNotification('Dziękujemy za zapisanie się do newslettera!');
            emailInput.value = '';
        });
    }
    
    // Product filters
    const filterForm = document.getElementById('filter-form');
    
    if (filterForm) {
        const filterInputs = filterForm.querySelectorAll('select, input[type="checkbox"]');
        
        filterInputs.forEach(input => {
            input.addEventListener('change', function() {
                filterForm.submit();
            });
        });
    }
});