@extends('layouts.app')

@section('content')
<h1>All Games</h1>


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
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt-dZ8u_dXZ4-AhDROEpQNiXqh9VNbGH1B9g&s" alt="Cyberpunk 2077">
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
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/271590/header.jpg" alt="Grand Theft Auto V">
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
    
    <!-- The Witcher 3 -->
    <div class="product-card" data-category="windows" data-price="39.99" data-rating="4.6" data-name="The Witcher 3">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/292030/header.jpg" alt="The Witcher 3">
        <h3>The Witcher 3</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.6/5</span>
        </div>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="3" data-name="The Witcher 3" data-price="39.99">Add to Cart</button>
        
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

    <!-- Elden Ring -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.8" data-name="Elden Ring">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1245620/header.jpg" alt="Elden Ring">
        <h3>Elden Ring</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.8/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="4" data-name="Elden Ring" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Mark T.</strong> ⭐⭐⭐⭐⭐
                <p>"FromSoftware's masterpiece! Incredible world design."</p>
            </div>
            <div class="review">
                <strong>Jessica L.</strong> ⭐⭐⭐⭐⭐
                <p>"Best open-world RPG I've ever played."</p>
            </div>
        </div>
    </div>

    <!-- Red Dead Redemption 2 -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.9" data-name="Red Dead Redemption 2">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1174180/header.jpg" alt="Red Dead Redemption 2">
        <h3>Red Dead Redemption 2</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.9/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="5" data-name="Red Dead Redemption 2" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>John D.</strong> ⭐⭐⭐⭐⭐
                <p>"Most realistic and immersive world ever created!"</p>
            </div>
            <div class="review">
                <strong>Maria S.</strong> ⭐⭐⭐⭐⭐
                <p>"Epic story with unforgettable characters."</p>
            </div>
        </div>
    </div>

    <!-- Doom Eternal -->
    <div class="product-card" data-category="windows" data-price="39.99" data-rating="4.7" data-name="Doom Eternal">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/782330/header.jpg" alt="Doom Eternal">
        <h3>Doom Eternal</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.7/5</span>
        </div>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="6" data-name="Doom Eternal" data-price="39.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Kyle B.</strong> ⭐⭐⭐⭐⭐
                <p>"Fastest and most intense FPS ever made!"</p>
            </div>
            <div class="review">
                <strong>Anna R.</strong> ⭐⭐⭐⭐
                <p>"Rip and tear! Amazing combat mechanics."</p>
            </div>
        </div>
    </div>

    <!-- Counter-Strike 2 -->
    <div class="product-card" data-category="windows" data-price="0.00" data-rating="4.8" data-name="Counter-Strike 2">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg" alt="Counter-Strike 2">
        <h3>Counter-Strike 2</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.8/5</span>
        </div>
        <p class="price">Free to Play</p>
        <button class="add-to-cart" data-id="7" data-name="Counter-Strike 2" data-price="0.00">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Mike S.</strong> ⭐⭐⭐⭐⭐
                <p>"The definitive competitive FPS experience!"</p>
            </div>
            <div class="review">
                <strong>Lisa P.</strong> ⭐⭐⭐⭐⭐
                <p>"Perfect gameplay mechanics and strategy."</p>
            </div>
        </div>
    </div>

    <!-- Baldur's Gate 3 -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.9" data-name="Baldur's Gate 3">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1086940/header.jpg" alt="Baldur's Gate 3">
        <h3>Baldur's Gate 3</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.9/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="8" data-name="Baldur's Gate 3" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Chris W.</strong> ⭐⭐⭐⭐⭐
                <p>"Game of the Year! Incredible RPG depth."</p>
            </div>
            <div class="review">
                <strong>Sarah K.</strong> ⭐⭐⭐⭐⭐
                <p>"Best storytelling and character development."</p>
            </div>
        </div>
    </div>

    <!-- Starfield -->
    <div class="product-card" data-category="windows" data-price="69.99" data-rating="4.3" data-name="Starfield">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1716740/header.jpg" alt="Starfield">
        <h3>Starfield</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐ <span class="rating-text">4.3/5</span>
        </div>
        <p class="price">$69.99</p>
        <button class="add-to-cart" data-id="9" data-name="Starfield" data-price="69.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Alex R.</strong> ⭐⭐⭐⭐
                <p>"Massive space exploration with endless possibilities!"</p>
            </div>
            <div class="review">
                <strong>Emma L.</strong> ⭐⭐⭐⭐
                <p>"Bethesda's biggest and most ambitious game."</p>
            </div>
        </div>
    </div>

    <!-- Hogwarts Legacy -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.7" data-name="Hogwarts Legacy">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/990080/header.jpg" alt="Hogwarts Legacy">
        <h3>Hogwarts Legacy</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.7/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="10" data-name="Hogwarts Legacy" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Harry P.</strong> ⭐⭐⭐⭐⭐
                <p>"Dream come true for Harry Potter fans!"</p>
            </div>
            <div class="review">
                <strong>Hermione G.</strong> ⭐⭐⭐⭐⭐
                <p>"Magical world brought to life beautifully."</p>
            </div>
        </div>
    </div>

    <!-- Resident Evil 4 -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.8" data-name="Resident Evil 4">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/2050650/header.jpg" alt="Resident Evil 4">
        <h3>Resident Evil 4</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.8/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="11" data-name="Resident Evil 4" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Leon K.</strong> ⭐⭐⭐⭐⭐
                <p>"Perfect remake of a classic horror game!"</p>
            </div>
            <div class="review">
                <strong>Ashley G.</strong> ⭐⭐⭐⭐
                <p>"Terrifying and intense survival horror experience."</p>
            </div>
        </div>
    </div>

    <!-- Call of Duty: Modern Warfare III -->
    <div class="product-card" data-category="windows" data-price="69.99" data-rating="4.2" data-name="Call of Duty: MW3">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1938090/header.jpg" alt="Call of Duty: Modern Warfare III">
        <h3>Call of Duty: MW3</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐ <span class="rating-text">4.2/5</span>
        </div>
        <p class="price">$69.99</p>
        <button class="add-to-cart" data-id="12" data-name="Call of Duty: MW3" data-price="69.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Price C.</strong> ⭐⭐⭐⭐
                <p>"Solid campaign and great multiplayer maps."</p>
            </div>
            <div class="review">
                <strong>Gaz K.</strong> ⭐⭐⭐⭐
                <p>"Classic COD action with modern graphics."</p>
            </div>
        </div>
    </div>

    <!-- Forza Horizon 5 -->
    <div class="product-card" data-category="windows" data-price="59.99" data-rating="4.8" data-name="Forza Horizon 5">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1551360/header.jpg" alt="Forza Horizon 5">
        <h3>Forza Horizon 5</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.8/5</span>
        </div>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="13" data-name="Forza Horizon 5" data-price="59.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Carlos S.</strong> ⭐⭐⭐⭐⭐
                <p>"Best racing game ever made! Stunning Mexico setting."</p>
            </div>
            <div class="review">
                <strong>Maria R.</strong> ⭐⭐⭐⭐⭐
                <p>"Incredible car collection and beautiful open world."</p>
            </div>
        </div>
    </div>

    <!-- Sea of Thieves -->
    <div class="product-card" data-category="windows" data-price="39.99" data-rating="4.5" data-name="Sea of Thieves">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1172620/header.jpg" alt="Sea of Thieves">
        <h3>Sea of Thieves</h3>
        <p class="category">Windows</p>
        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">4.5/5</span>
        </div>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="14" data-name="Sea of Thieves" data-price="39.99">Add to Cart</button>
        
        <div class="reviews">
            <div class="review">
                <strong>Jack S.</strong> ⭐⭐⭐⭐⭐
                <p>"Best pirate game ever! So much fun with friends."</p>
            </div>
            <div class="review">
                <strong>Anne B.</strong> ⭐⭐⭐⭐
                <p>"Beautiful ocean and amazing ship combat."</p>
            </div>
        </div>
    </div>
</div>
@endsection