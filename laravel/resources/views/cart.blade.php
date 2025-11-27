@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1 style="color: #8b5cf6;">Shopping Cart</h1>
        
        <div id="cart-items" class="cart-items-container">
            <!-- Dummy Cart Items -->
            <div class="cart-item">
                <div class="item-image">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg" alt="The Witcher 3">
                </div>
                <div class="item-details">
                    <h4 style="color: #111827; margin: 0 0 5px 0;">The Witcher 3: Wild Hunt</h4>
                    <p style="color: #6b7280; margin: 0; font-size: 0.9em;">Windows • RPG</p>
                    <div class="rating" style="color: #f59e0b; margin: 5px 0;">⭐⭐⭐⭐⭐ 4.6/5</div>
                </div>
                <div class="item-price">
                    <div class="quantity-controls">
                        <button class="quantity-btn">-</button>
                        <span class="quantity">1</span>
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="price" style="color: #7c3aed; font-weight: bold; font-size: 1.2em;">$39.99</div>
                    <button class="remove-btn" style="color: #ef4444; background: none; border: none; cursor: pointer;">🗑️ Remove</button>
                </div>
            </div>

            <div class="cart-item">
                <div class="item-image">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg" alt="Elden Ring">
                </div>
                <div class="item-details">
                    <h4 style="color: #111827; margin: 0 0 5px 0;">Elden Ring</h4>
                    <p style="color: #6b7280; margin: 0; font-size: 0.9em;">Windows • Action RPG</p>
                    <div class="rating" style="color: #f59e0b; margin: 5px 0;">⭐⭐⭐⭐⭐ 4.8/5</div>
                </div>
                <div class="item-price">
                    <div class="quantity-controls">
                        <button class="quantity-btn">-</button>
                        <span class="quantity">1</span>
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="price" style="color: #7c3aed; font-weight: bold; font-size: 1.2em;">$59.99</div>
                    <button class="remove-btn" style="color: #ef4444; background: none; border: none; cursor: pointer;">🗑️ Remove</button>
                </div>
            </div>

            <div class="cart-item">
                <div class="item-image">
                    <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg" alt="Counter-Strike 2">
                </div>
                <div class="item-details">
                    <h4 style="color: #111827; margin: 0 0 5px 0;">Counter-Strike 2</h4>
                    <p style="color: #6b7280; margin: 0; font-size: 0.9em;">Windows • FPS</p>
                    <div class="rating" style="color: #f59e0b; margin: 5px 0;">⭐⭐⭐⭐⭐ 4.8/5</div>
                </div>
                <div class="item-price">
                    <div class="quantity-controls">
                        <button class="quantity-btn">-</button>
                        <span class="quantity">1</span>
                        <button class="quantity-btn">+</button>
                    </div>
                    <div class="price" style="color: #10b981; font-weight: bold; font-size: 1.2em;">Free to Play</div>
                    <button class="remove-btn" style="color: #ef4444; background: none; border: none; cursor: pointer;">🗑️ Remove</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="order-summary">
            <h3 style="color: #f59e0b;">Order Summary</h3>
            
            <div class="summary-details">
                <div class="summary-row">
                    <span style="color: #6b7280;">Subtotal (3 items):</span>
                    <span style="color: #111827;">$<span id="subtotal">99.98</span></span>
                </div>
                <div class="summary-row">
                    <span style="color: #6b7280;">Shipping:</span>
                    <span style="color: #10b981;">$<span id="shipping">0.00</span></span>
                </div>
                <div class="summary-row">
                    <span style="color: #6b7280;">Tax:</span>
                    <span style="color: #ef4444;">$<span id="tax">8.99</span></span>
                </div>
                <hr style="border-color: #d1d5db;">
                <div class="summary-row total-row">
                    <strong style="color: #111827;">Total:</strong>
                    <strong style="color: #7c3aed;">$<span id="cart-total">108.97</span></strong>
                </div>
            </div>
            
            <div class="order-details">
                <h4 style="color: #f59e0b;">Order Details</h4>
                <div class="detail-item">
                    <span style="color: #6b7280;">Items in Cart:</span>
                    <span style="color: #7c3aed;" id="item-count">3</span>
                </div>
                <div class="detail-item">
                    <span style="color: #6b7280;">Delivery:</span>
                    <span style="color: #10b981;">Free Shipping</span>
                </div>
                <div class="detail-item">
                    <span style="color: #6b7280;">Estimated Delivery:</span>
                    <span style="color: #f59e0b;">2-3 business days</span>
                </div>
                <div class="detail-item">
                    <span style="color: #6b7280;">Savings:</span>
                    <span style="color: #10b981;">$10.00</span>
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