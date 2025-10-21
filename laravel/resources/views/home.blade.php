@extends('layouts.app')

@section('content')
<div class="hero">
    <h1>Welcome to OmniPlay</h1>
    <p>Your ultimate destination for Windows, Console, and Handheld games!</p>
    <a href="/products" class="btn">Shop Now</a>
</div>

<section class="featured-products">
    <h2>Featured Games</h2>
    <div class="products-grid">
        <div class="product-card">
            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co49wj.jpg" alt="GTA V">
            <h3>GTA V</h3>
            <p class="category">Windows</p>
            <p class="price">$29.99</p>
            <button class="add-to-cart" data-id="2" data-name="GTA V" data-price="29.99">Add to Cart</button>
        </div>
        <div class="product-card">
            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jni.jpg" alt="God of War">
            <h3>God of War</h3>
            <p class="category">Console</p>
            <p class="price">$49.99</p>
            <button class="add-to-cart" data-id="5" data-name="God of War" data-price="49.99">Add to Cart</button>
        </div>
        <div class="product-card">
            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2f.jpg" alt="Zelda: Breath of the Wild">
            <h3>Zelda: Breath of the Wild</h3>
            <p class="category">Handheld</p>
            <p class="price">$59.99</p>
            <button class="add-to-cart" data-id="9" data-name="Zelda: Breath of the Wild" data-price="59.99">Add to Cart</button>
        </div>
        <div class="product-card">
            <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4k7m.jpg" alt="The Witcher 3">
            <h3>The Witcher 3</h3>
            <p class="category">Windows</p>
            <p class="price">$39.99</p>
            <button class="add-to-cart" data-id="4" data-name="The Witcher 3" data-price="39.99">Add to Cart</button>
        </div>
    </div>
</section>

<section class="categories">
    <h2>Shop by Category</h2>
    <div class="category-cards">
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1542751371-adc38448a05e?w=400&h=300&fit=crop" alt="Windows Games">
            <h3>Windows Games</h3>
            <a href="/products?category=windows" class="btn">Browse</a>
        </div>
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1486572788966-cfd3df1f5b42?w=400&h=300&fit=crop" alt="Console Games">
            <h3>Console Games</h3>
            <a href="/products?category=console" class="btn">Browse</a>
        </div>
        <div class="category-card">
            <img src="https://images.unsplash.com/photo-1580327344181-c1163234e5a0?w=400&h=300&fit=crop" alt="Handheld Games">
            <h3>Handheld Games</h3>
            <a href="/products?category=handheld" class="btn">Browse</a>
        </div>
    </div>
</section>
@endsection