@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Welcome to OmniPlay</h1>
    <p>Your ultimate destination for Windows PC games!</p>
    <a href="/products" class="btn">Shop Now</a>
</div>

<section class="featured-products">
    <h2>Featured Games</h2>
    <div class="products-grid">
        <div class="product-card">
            <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1091500/header.jpg" alt="Cyberpunk 2077">
            <h3>Cyberpunk 2077</h3>
            <p class="category">Windows</p>
            <p class="price">$49.99</p>
            <button class="add-to-cart" data-id="1" data-name="Cyberpunk 2077" data-price="49.99">Add to Cart</button>
        </div>

        <div class="product-card">
            <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/271590/header.jpg" alt="GTA V">
            <h3>GTA V</h3>
            <p class="category">Windows</p>
            <p class="price">$29.99</p>
            <button class="add-to-cart" data-id="2" data-name="GTA V" data-price="29.99">Add to Cart</button>
        </div>

        <div class="product-card">
            <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg" alt="The Witcher 3">
            <h3>The Witcher 3</h3>
            <p class="category">Windows</p>
            <p class="price">$39.99</p>
            <button class="add-to-cart" data-id="3" data-name="The Witcher 3" data-price="39.99">Add to Cart</button>
        </div>

        <div class="product-card">
            <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg" alt="Elden Ring">
            <h3>Elden Ring</h3>
            <p class="category">Windows</p>
            <p class="price">$59.99</p>
            <button class="add-to-cart" data-id="4" data-name="Elden Ring" data-price="59.99">Add to Cart</button>
        </div>
    </div>
</section>

<section class="customer-reviews">
    <h2>What Our Gamers Say</h2>
    <div class="reviews-grid">
        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">🎮</div>
                <div class="reviewer-info">
                    <h4>Alex Johnson</h4>
                    <div class="review-stars">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <p class="review-text">"OmniPlay has the best collection of PC games! Fast downloads and great customer support. Highly recommended!"</p>
            <div class="review-game">Recently played: Cyberpunk 2077</div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">👑</div>
                <div class="reviewer-info">
                    <h4>Sarah Miller</h4>
                    <div class="review-stars">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <p class="review-text">"Amazing platform! The prices are unbeatable and the game selection is fantastic. My go-to store for all PC gaming needs."</p>
            <div class="review-game">Recently played: Baldur's Gate 3</div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">⚡</div>
                <div class="reviewer-info">
                    <h4>Mike Rodriguez</h4>
                    <div class="review-stars">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <p class="review-text">"Quick delivery, great deals, and an excellent loyalty program. OmniPlay understands what gamers really want!"</p>
            <div class="review-game">Recently played: Elden Ring</div>
        </div>

        <div class="review-card">
            <div class="review-header">
                <div class="reviewer-avatar">🌟</div>
                <div class="reviewer-info">
                    <h4>Emily Chen</h4>
                    <div class="review-stars">⭐⭐⭐⭐⭐</div>
                </div>
            </div>
            <p class="review-text">"The user experience is smooth and the game recommendations are spot on. Found so many hidden gems here!"</p>
            <div class="review-game">Recently played: The Witcher 3</div>
        </div>
    </div>
</section>
@endsection