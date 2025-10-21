@extends('layouts.app')

@section('content')
<h1>Shopping Cart</h1>

<div id="cart-items">
    <p>Your cart is empty.</p>
</div>

<div class="cart-total">
    <h3>Total: $<span id="cart-total">0.00</span></h3>
    <div class="cart-actions">
        <a href="/products" class="continue-shopping">Continue Shopping</a>
        <button id="checkout-btn" class="checkout-btn">Proceed to Checkout</button>
    </div>
</div>
@endsection