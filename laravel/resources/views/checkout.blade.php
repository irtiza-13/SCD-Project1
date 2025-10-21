@extends('layouts.app')

@section('content')
<div class="checkout-container">
    <h1>Checkout</h1>
    
    <div class="checkout-content">
        <!-- Order Summary -->
        <div class="order-summary">
            <h2>Order Summary</h2>
            <div id="checkout-items">
                <!-- Cart items will be displayed here -->
            </div>
            <div class="order-total">
                <h3>Total: $<span id="checkout-total">0.00</span></h3>
            </div>
        </div>

        <!-- Shipping & Payment Form -->
        <div class="checkout-form">
            <h2>Shipping Information</h2>
            <form id="checkout-form">
                <div class="form-group">
                    <label for="fullname">Full Name *</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>

                <div class="form-group">
                    <label for="address">Shipping Address *</label>
                    <textarea id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="city">City *</label>
                    <input type="text" id="city" name="city" required>
                </div>

                <div class="form-group">
                    <label for="zipcode">ZIP Code *</label>
                    <input type="text" id="zipcode" name="zipcode" required>
                </div>

                <h2>Payment Method</h2>
                <div class="payment-method">
                    <div class="payment-option">
                        <input type="radio" id="cod" name="payment" value="cod" checked>
                        <label for="cod">Cash on Delivery</label>
                    </div>
                    <div class="cod-notice">
                        <p>💰 Pay when you receive your order</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="notes">Order Notes (Optional)</label>
                    <textarea id="notes" name="notes" rows="3" placeholder="Any special instructions..."></textarea>
                </div>

                <button type="submit" class="place-order-btn">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection