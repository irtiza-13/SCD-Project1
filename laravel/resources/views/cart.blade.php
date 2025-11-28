@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1 style="color: #8b5cf6;">Shopping Cart</h1>

        <div id="cart-items" class="cart-items-container">
            <!-- JS will inject cart items here -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="order-summary">
            <h3 style="color: #f59e0b;">Order Summary</h3>

            <div class="summary-details">
                <div class="summary-row">
                    <span style="color: #6b7280;">Subtotal:</span>
                    <span style="color: #111827;">$<span id="subtotal">0.00</span></span>
                </div>
                <div class="summary-row">
                    <span style="color: #6b7280;">Shipping:</span>
                    <span style="color: #10b981;">$0.00</span>
                </div>
                <div class="summary-row">
                    <span style="color: #6b7280;">Tax (10%):</span>
                    <span style="color: #ef4444;">$<span id="tax">0.00</span></span>
                </div>

                <hr style="border-color: #d1d5db;">
                <div class="summary-row total-row">
                    <strong style="color: #111827;">Total:</strong>
                    <strong style="color: #7c3aed;">$<span id="cart-total">0.00</span></strong>
                </div>
            </div>

            <div class="order-details">
                <h4 style="color: #f59e0b;">Order Details</h4>
                <div class="detail-item">
                    <span style="color: #6b7280;">Items in Cart:</span>
                    <span style="color: #7c3aed;" id="item-count">0</span>
                </div>
            </div>

            <div class="cart-actions">
                <a href="/products" class="continue-shopping">🔄 Continue Shopping</a>
                <a id="checkout-btn" class="checkout-btn" href="/checkout">🚀 Proceed to Checkout</a>
            </div>

            <div class="security-badge" style="text-align: center; margin-top: 15px; padding: 10px; background: rgba(16, 185, 129, 0.1); border-radius: 5px; border: 1px solid #10b981;">
                <span style="color: #10b981;">🔒 Secure Checkout • 🛡️ Buyer Protection</span>
            </div>
        </div>
    </div>
</div>

{{-- KEEP YOUR CSS UNCHANGED (not rewriting here) --}}
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    const cartItemsContainer = document.getElementById('cart-items');
    const subtotalElem = document.getElementById('subtotal');
    const taxElem = document.getElementById('tax');
    const cartTotalElem = document.getElementById('cart-total');
    const itemCountElem = document.getElementById('item-count');

    // Load Cart
    function loadCart() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        cartItemsContainer.innerHTML = "";

        if (cart.length === 0) {
            cartItemsContainer.innerHTML = `
                <p class="text-center text-muted">Your cart is empty 😢</p>
            `;
            updateSummary(cart);
            return;
        }

        cart.forEach(item => {
            const itemHTML = `
            <div class="cart-item" data-id="${item.id}">
                <div class="item-image">
                    <img src="${item.image}" alt="${item.name}">
                </div>

                <div class="item-details">
                    <h4 style="color: #111827; margin: 0 0 5px 0;">${item.name}</h4>
                    <p style="color: #6b7280; margin: 0; font-size: 0.9em;">${item.category ?? ''}</p>
                </div>

                <div class="item-price">
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease">-</button>
                        <span class="quantity">${item.quantity}</span>
                        <button class="quantity-btn increase">+</button>
                    </div>

                    <div class="price" style="color: #7c3aed; font-weight: bold; font-size: 1.2em;">
                        $${(item.price * item.quantity).toFixed(2)}
                    </div>

                    <button class="remove-btn" style="color: #ef4444; background: none; border: none; cursor: pointer;">
                        🗑️ Remove
                    </button>
                </div>
            </div>
            `;

            cartItemsContainer.innerHTML += itemHTML;
        });

        updateSummary(cart);
        addListeners();
    }

    // Update Summary
    function updateSummary(cart) {
        let subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        let tax = subtotal * 0.10;
        let total = subtotal + tax;

        subtotalElem.textContent = subtotal.toFixed(2);
        taxElem.textContent = tax.toFixed(2);
        cartTotalElem.textContent = total.toFixed(2);
        itemCountElem.textContent = cart.length;
    }

    // Save cart
    function save(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Button Listeners
    function addListeners() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Increase quantity
        document.querySelectorAll('.increase').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.closest('.cart-item').dataset.id;
                const item = cart.find(i => i.id == id);
                item.quantity++;
                save(cart);
                loadCart();
            });
        });

        // Decrease quantity
        document.querySelectorAll('.decrease').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.closest('.cart-item').dataset.id;
                const item = cart.find(i => i.id == id);
                if (item.quantity > 1) item.quantity--;
                save(cart);
                loadCart();
            });
        });

        // Remove item
        document.querySelectorAll('.remove-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.closest('.cart-item').dataset.id;
                const index = cart.findIndex(i => i.id == id);
                cart.splice(index, 1);
                save(cart);
                loadCart();
            });
        });
    }

    loadCart();
});
</script>


<style>
.order-summary {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    padding: 25px;
    border-radius: 12px;
    border: 2px solid #475569;
    margin-top: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
}

.summary-details {
    margin-bottom: 25px;
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 8px;
    border: 1px solid #475569;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 12px;
    padding: 8px 0;
    font-size: 1.05em;
}

.total-row {
    border-top: 2px solid #f59e0b;
    padding-top: 15px;
    font-size: 1.2em;
}

.order-details {
    background: rgba(255, 255, 255, 0.05);
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 25px;
    border: 1px solid #475569;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 0.95em;
    padding: 5px 0;
}

.cart-actions {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.continue-shopping {
    text-align: center;
    padding: 12px;
    background: linear-gradient(135deg, #6b7280 0%, #9ca3af 100%);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 1px solid #9ca3af;
}

.continue-shopping:hover {
    background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    color: white;
    text-decoration: none;
}

.checkout-btn {
    padding: 15px;
    background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 700;
    font-size: 1.1em;
    transition: all 0.3s ease;
    border: 1px solid #8b5cf6;
    text-align: center;
    text-decoration: none;
}

.checkout-btn:hover {
    background: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
}

.cart-items-container {
    min-height: 200px;
    background: #f8fafc;
    padding: 20px;
    border-radius: 12px;
    border: 2px solid #e2e8f0;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 15px;
    margin-bottom: 15px;
    background: white;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.item-image img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 15px;
}

.item-details {
    flex: 1;
}

.item-price {
    text-align: right;
    min-width: 150px;
}

.quantity-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 8px;
}

.quantity-btn {
    background: #8b5cf6;
    color: white;
    border: none;
    width: 30px;
    height: 30px;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
}

.quantity {
    margin: 0 10px;
    font-weight: bold;
    color: #111827;
}

.remove-btn:hover {
    color: #dc2626 !important;
}

h1 {
    font-weight: 800;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.order-summary h3, .order-summary h4 {
    font-weight: 700;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
}

@media (max-width: 768px) {
    .row {
        flex-direction: column;
    }
    
    .order-summary {
        margin-top: 30px;
    }
    
    .cart-item {
        flex-direction: column;
        text-align: center;
    }
    
    .item-image img {
        margin-right: 0;
        margin-bottom: 10px;
    }
    
    .item-price {
        text-align: center;
        margin-top: 10px;
    }
}
</style>

@endsection