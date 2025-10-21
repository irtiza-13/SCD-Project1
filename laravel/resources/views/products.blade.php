@extends('layouts.app')

@section('content')
<h1>All Games</h1>

<div class="category-filter">
    <button class="filter-btn active" data-category="all">All Games</button>
    <button class="filter-btn" data-category="windows">Windows</button>
    <button class="filter-btn" data-category="console">Console</button>
    <button class="filter-btn" data-category="handheld">Handheld</button>
</div>

<div class="filters-row">
    <div class="filter-group">
        <label for="price-filter">Price Range:</label>
        <select id="price-filter" class="filter-select">
            <option value="all">All Prices</option>
            <option value="0-25">Under $25</option>
            <option value="25-40">$25 - $40</option>
            <option value="40-60">$40 - $60</option>
            <option value="60-100">$60+</option>
        </select>
    </div>
    
    <div class="filter-group">
        <label for="rating-filter">Minimum Rating:</label>
        <select id="rating-filter" class="filter-select">
            <option value="0">All Ratings</option>
            <option value="4">4+ Stars</option>
            <option value="3">3+ Stars</option>
            <option value="2">2+ Stars</option>
        </select>
    </div>
    
    <div class="filter-group">
        <label for="sort-by">Sort By:</label>
        <select id="sort-by" class="filter-select">
            <option value="featured">Featured</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="rating">Highest Rated</option>
            <option value="name">Name: A-Z</option>
        </select>
    </div>
</div>

<div class="products-grid">
    <!-- Cyberpunk 2077 -->
    <div class="product-card" data-category="windows" data-price="49.99" data-rating="4.5" data-name="Cyberpunk 2077">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co2x8c.jpg" alt="Cyberpunk 2077">
        <h3>Cyberpunk 2077</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.5/5</span>
        </div>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="1" data-name="Cyberpunk 2077" data-price="49.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Alex T.</strong> ⭐⭐⭐⭐⭐
                <p>"Amazing graphics and immersive world!"</p>
            </div>
            <div class="review">
                <strong>Sarah M.</strong> ⭐⭐⭐⭐
                <p>"Great story but some bugs still exist."</p>
            </div>
        </div>
    </div>
    
    <!-- GTA V -->
    <div class="product-card" data-category="windows" data-price="29.99" data-rating="4.8" data-name="GTA V">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co49wj.jpg" alt="Grand Theft Auto V">
        <h3>GTA V</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.8/5</span>
        </div>
        <p class="price">$29.99</p>
        <button class="add-to-cart" data-id="2" data-name="GTA V" data-price="29.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Mike R.</strong> ⭐⭐⭐⭐⭐
                <p>"Endless fun with friends online!"</p>
            </div>
            <div class="review">
                <strong>Jenny L.</strong> ⭐⭐⭐⭐⭐
                <p>"Best open-world game ever made."</p>
            </div>
        </div>
    </div>
    
    <!-- God of War -->
    <div class="product-card" data-category="console" data-price="49.99" data-rating="4.9" data-name="God of War">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jni.jpg" alt="God of War">
        <h3>God of War</h3>
        <p class="category">Console</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.9/5</span>
        </div>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="5" data-name="God of War" data-price="49.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Chris P.</strong> ⭐⭐⭐⭐⭐
                <p>"Incredible story and combat system!"</p>
            </div>
            <div class="review">
                <strong>Lisa K.</strong> ⭐⭐⭐⭐⭐
                <p>"Emotional journey with stunning visuals."</p>
            </div>
        </div>
    </div>
    
    <!-- Zelda: Breath of the Wild -->
    <div class="product-card" data-category="handheld" data-price="59.99" data-rating="4.7" data-name="Zelda: Breath of the Wild">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2f.jpg" alt="The Legend of Zelda: Breath of the Wild">
        <h3>Zelda: Breath of the Wild</h3>
        <p class="category">Handheld</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.7/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="9" data-name="Zelda: Breath of the Wild" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Tom B.</strong> ⭐⭐⭐⭐⭐
                <p>"Revolutionary open-world design!"</p>
            </div>
            <div class="review">
                <strong>Emma S.</strong> ⭐⭐⭐⭐
                <p>"Beautiful game with so much to explore."</p>
            </div>
        </div>
    </div>
    
    <!-- The Witcher 3 -->
    <div class="product-card" data-category="windows" data-price="39.99" data-rating="4.6" data-name="The Witcher 3">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4k7m.jpg" alt="The Witcher 3">
        <h3>The Witcher 3</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.6/5</span>
        </div>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="4" data-name="The Witcher 3" data-price="39.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>David M.</strong> ⭐⭐⭐⭐⭐
                <p>"Masterpiece! Best RPG I've ever played."</p>
            </div>
            <div class="review">
                <strong>Sophia T.</strong> ⭐⭐⭐⭐⭐
                <p>"Incredible storytelling and characters."</p>
            </div>
        </div>
    </div>
    
    <!-- Animal Crossing -->
    <div class="product-card" data-category="handheld" data-price="54.99" data-rating="4.4" data-name="Animal Crossing">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jnj.jpg" alt="Animal Crossing: New Horizons">
        <h3>Animal Crossing</h3>
        <p class="category">Handheld</p>
        <div class="rating">
            ⭐⭐⭐⭐ <span class="rating-text">4.4/5</span>
        </div>
        <p class="price">$54.99</p>
        <button class="add-to-cart" data-id="10" data-name="Animal Crossing" data-price="54.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Rachel G.</strong> ⭐⭐⭐⭐⭐
                <p>"So relaxing and addictive!"</p>
            </div>
            <div class="review">
                <strong>Kevin L.</strong> ⭐⭐⭐⭐
                <p>"Perfect game to unwind after work."</p>
            </div>
        </div>
    </div>
</div>
@endsection