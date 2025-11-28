@extends('layouts.app')

@section('content')
<div class="thankyou-container" style="text-align: center; padding: 80px 20px;">
    <div class="thankyou-box" style="display: inline-block; background: #f9fafb; padding: 50px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        
        <div class="thankyou-icon" style="font-size: 60px; color: #10b981; margin-bottom: 20px;">
            ✅
        </div>
        
        <h1 style="font-size: 36px; color: #111827; margin-bottom: 10px;">Thank You for Your Order!</h1>
        
        <p style="font-size: 18px; color: #6b7280; margin-bottom: 30px;">
            Your order has been successfully placed. We are preparing it and you will receive a confirmation email shortly.
        </p>
        
        <div class="order-actions" style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap;">
            <a href="/products" style="padding: 12px 25px; background: #7c3aed; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                🔄 Continue Shopping
            </a>
            <a href="/orders" style="padding: 12px 25px; background: #10b981; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: all 0.3s ease;">
                📦 View My Orders
            </a>
        </div>
        
        <p style="margin-top: 25px; color: #9ca3af; font-size: 14px;">
            If you have any questions, contact us at <a href="mailto:support@omniplay.com" style="color: #7c3aed;">support@omniplay.com</a>
        </p>
    </div>
</div>
@endsection
