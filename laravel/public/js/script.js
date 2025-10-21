// Simple cart functionality
class SimpleCart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('omniply_cart')) || [];
        this.updateCartDisplay();
    }

    addItem(productId, productName, productPrice) {
        const existingItem = this.items.find(item => item.id === productId);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.items.push({
                id: productId,
                name: productName,
                price: parseFloat(productPrice),
                quantity: 1
            });
        }
        
        this.saveCart();
        this.updateCartDisplay();
        alert(`${productName} added to cart!`);
    }

    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.saveCart();
        this.updateCartDisplay();
    }

    updateQuantity(productId, quantity) {
        const item = this.items.find(item => item.id === productId);
        if (item) {
            item.quantity = parseInt(quantity);
            if (item.quantity <= 0) {
                this.removeItem(productId);
            } else {
                this.saveCart();
                this.updateCartDisplay();
            }
        }
    }

    getTotal() {
        return this.items.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    getTotalItems() {
        return this.items.reduce((total, item) => total + item.quantity, 0);
    }

    saveCart() {
        localStorage.setItem('omniply_cart', JSON.stringify(this.items));
    }

    updateCartDisplay() {
        // Update cart count in header
        const cartCount = document.getElementById('cart-count');
        if (cartCount) {
            cartCount.textContent = this.getTotalItems();
        }

        // Update cart page if we're on cart page
        this.updateCartPage();
        
        // Update checkout page if we're on checkout page
        this.updateCheckoutPage();
    }

    updateCartPage() {
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        
        if (cartItems && cartTotal) {
            if (this.items.length === 0) {
                cartItems.innerHTML = '<p>Your cart is empty.</p>';
            } else {
                cartItems.innerHTML = this.items.map(item => `
                    <div class="cart-item">
                        <div>
                            <h3>${item.name}</h3>
                            <p>$${item.price.toFixed(2)}</p>
                        </div>
                        <div>
                            <input type="number" value="${item.quantity}" min="1" 
                                   onchange="cart.updateQuantity(${item.id}, this.value)">
                            <button onclick="cart.removeItem(${item.id})">Remove</button>
                            <p>$${(item.price * item.quantity).toFixed(2)}</p>
                        </div>
                    </div>
                `).join('');
            }
            
            cartTotal.textContent = this.getTotal().toFixed(2);
        }
    }

    updateCheckoutPage() {
        const checkoutItems = document.getElementById('checkout-items');
        const checkoutTotal = document.getElementById('checkout-total');
        
        if (checkoutItems && checkoutTotal) {
            if (this.items.length === 0) {
                checkoutItems.innerHTML = '<p>Your cart is empty.</p>';
            } else {
                checkoutItems.innerHTML = this.items.map(item => `
                    <div class="checkout-item">
                        <div class="checkout-item-info">
                            <h4>${item.name}</h4>
                            <p>Quantity: ${item.quantity}</p>
                        </div>
                        <div class="checkout-item-price">
                            $${(item.price * item.quantity).toFixed(2)}
                        </div>
                    </div>
                `).join('');
            }
            
            checkoutTotal.textContent = this.getTotal().toFixed(2);
        }
    }
}

// Initialize cart
const cart = new SimpleCart();

// Add event listeners when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            
            cart.addItem(productId, productName, productPrice);
        });
    });

    // Category filter buttons
    const filterButtons = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter products
            productCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Checkout button on cart page
    const cartCheckoutBtn = document.getElementById('checkout-btn');
    if (cartCheckoutBtn) {
        cartCheckoutBtn.addEventListener('click', function() {
            if (cart.items.length === 0) {
                alert('Your cart is empty!');
            } else {
                window.location.href = '/checkout';
            }
        });
    }
    
    // Checkout form submission
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        checkoutForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (cart.items.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            
            // Simple form validation
            const formData = new FormData(this);
            const fullname = formData.get('fullname');
            const email = formData.get('email');
            const phone = formData.get('phone');
            const address = formData.get('address');
            const city = formData.get('city');
            const zipcode = formData.get('zipcode');
            
            if (!fullname || !email || !phone || !address || !city || !zipcode) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate order processing
            const orderNumber = 'OMNI' + Date.now();
            const orderTotal = cart.getTotal().toFixed(2);
            
            // Show success message
            alert(`🎉 Order Placed Successfully!\n\nOrder Number: ${orderNumber}\nTotal: $${orderTotal}\nPayment Method: Cash on Delivery\n\nThank you for your order! You will receive a confirmation email shortly.`);
            
            // Clear cart and redirect
            cart.items = [];
            cart.saveCart();
            cart.updateCartDisplay();
            
            // Redirect to home page
            window.location.href = '/';
        });
    }
});

// Animated background stars (optional)
function createStars() {
    const body = document.querySelector('body');
    const starsCount = 50;
    
    for (let i = 0; i < starsCount; i++) {
        const star = document.createElement('div');
        star.style.position = 'fixed';
        star.style.width = Math.random() * 3 + 'px';
        star.style.height = star.style.width;
        star.style.background = 'white';
        star.style.borderRadius = '50%';
        star.style.left = Math.random() * 100 + 'vw';
        star.style.top = Math.random() * 100 + 'vh';
        star.style.opacity = Math.random() * 0.7 + 0.3;
        star.style.pointerEvents = 'none';
        star.style.zIndex = '-1';
        star.style.animation = `twinkle ${Math.random() * 3 + 2}s infinite alternate`;
        body.appendChild(star);
    }
}

// Add this CSS for twinkling animation
const style = document.createElement('style');
style.textContent = `
    @keyframes twinkle {
        0% { opacity: 0.3; }
        100% { opacity: 1; }
    }
`;
document.head.appendChild(style);


// Call this in DOMContentLoaded if you want animated stars
// document.addEventListener('DOMContentLoaded', createStars);



// PlayStation Matrix Background (Optional)
function createPSMatrix() {
    const matrixContainer = document.createElement('div');
    matrixContainer.className = 'ps-matrix';
    document.body.appendChild(matrixContainer);

    const psSymbols = ['◯', '△', '✕', '□', 'PS', '●', '▲', '■'];
    const colors = ['#0061ff', '#0072ce', '#ffffff', '#00ff88'];
    
    for (let i = 0; i < 30; i++) {
        const symbol = document.createElement('div');
        symbol.className = 'ps-letter';
        symbol.textContent = psSymbols[Math.floor(Math.random() * psSymbols.length)];
        symbol.style.left = Math.random() * 100 + 'vw';
        symbol.style.animationDelay = Math.random() * 10 + 's';
        symbol.style.color = colors[Math.floor(Math.random() * colors.length)];
        symbol.style.fontSize = (Math.random() * 20 + 15) + 'px';
        matrixContainer.appendChild(symbol);
    }
}

// Call this in DOMContentLoaded if you want the matrix effect
// document.addEventListener('DOMContentLoaded', createPSMatrix);

// Advanced Filtering System
class GameFilters {
    constructor() {
        this.currentCategory = 'all';
        this.currentPrice = 'all';
        this.currentRating = 0;
        this.currentSort = 'featured';
        this.initFilters();
    }

    initFilters() {
        // Category filter
        const categoryButtons = document.querySelectorAll('.filter-btn');
        categoryButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                this.currentCategory = e.target.getAttribute('data-category');
                this.applyFilters();
            });
        });

        // Price filter
        const priceFilter = document.getElementById('price-filter');
        if (priceFilter) {
            priceFilter.addEventListener('change', (e) => {
                this.currentPrice = e.target.value;
                this.applyFilters();
            });
        }

        // Rating filter
        const ratingFilter = document.getElementById('rating-filter');
        if (ratingFilter) {
            ratingFilter.addEventListener('change', (e) => {
                this.currentRating = parseInt(e.target.value);
                this.applyFilters();
            });
        }

        // Sort filter
        const sortFilter = document.getElementById('sort-by');
        if (sortFilter) {
            sortFilter.addEventListener('change', (e) => {
                this.currentSort = e.target.value;
                this.applyFilters();
            });
        }
    }

    applyFilters() {
        const products = document.querySelectorAll('.product-card');
        let visibleCount = 0;

        products.forEach(product => {
            const category = product.getAttribute('data-category');
            const price = parseFloat(product.getAttribute('data-price'));
            const rating = parseFloat(product.getAttribute('data-rating'));
            const name = product.getAttribute('data-name');

            // Category filter
            const categoryMatch = this.currentCategory === 'all' || category === this.currentCategory;
            
            // Price filter
            let priceMatch = true;
            if (this.currentPrice !== 'all') {
                const [min, max] = this.currentPrice.split('-').map(Number);
                priceMatch = price >= min && (max ? price <= max : true);
            }

            // Rating filter
            const ratingMatch = rating >= this.currentRating;

            // Show/hide based on filters
            if (categoryMatch && priceMatch && ratingMatch) {
                product.style.display = 'block';
                visibleCount++;
            } else {
                product.style.display = 'none';
            }
        });

        // Sort products
        this.sortProducts(products);

        // Update active category buttons
        this.updateActiveButtons();
    }

    sortProducts(products) {
        const productsArray = Array.from(products).filter(p => p.style.display !== 'none');
        const container = document.querySelector('.products-grid');

        productsArray.sort((a, b) => {
            const aPrice = parseFloat(a.getAttribute('data-price'));
            const bPrice = parseFloat(b.getAttribute('data-price'));
            const aRating = parseFloat(a.getAttribute('data-rating'));
            const bRating = parseFloat(b.getAttribute('data-rating'));
            const aName = a.getAttribute('data-name');
            const bName = b.getAttribute('data-name');

            switch (this.currentSort) {
                case 'price-low':
                    return aPrice - bPrice;
                case 'price-high':
                    return bPrice - aPrice;
                case 'rating':
                    return bRating - aRating;
                case 'name':
                    return aName.localeCompare(bName);
                default: // featured
                    return 0;
            }
        });

        // Reorder products in DOM
        productsArray.forEach(product => {
            container.appendChild(product);
        });
    }

    updateActiveButtons() {
        const categoryButtons = document.querySelectorAll('.filter-btn');
        categoryButtons.forEach(btn => {
            if (btn.getAttribute('data-category') === this.currentCategory) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }
}

// Initialize filters when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // ... your existing DOMContentLoaded code ...
    
    // Initialize filters
    const gameFilters = new GameFilters();
    
    // Add click handlers for review toggle (optional)
    const productCards = document.querySelectorAll('.product-card');
    productCards.forEach(card => {
        card.addEventListener('click', function(e) {
            if (!e.target.classList.contains('add-to-cart')) {
                this.classList.toggle('expanded');
            }
        });
    });
});