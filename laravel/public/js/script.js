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