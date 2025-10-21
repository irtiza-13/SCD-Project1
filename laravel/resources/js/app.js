import './bootstrap';
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
}

// Initialize cart
const cart = new SimpleCart();

// Add event listeners to all "Add to Cart" buttons
document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = this.getAttribute('data-name');
            const productPrice = this.getAttribute('data-price');
            
            cart.addItem(productId, productName, productPrice);
        });
    });

    // Checkout button
    const checkoutBtn = document.getElementById('checkout-btn');
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            if (cart.items.length === 0) {
                alert('Your cart is empty!');
            } else {
                alert('Thank you for your purchase! This is a demo store.');
                cart.items = [];
                cart.saveCart();
                cart.updateCartDisplay();
            }
        });
    }
});