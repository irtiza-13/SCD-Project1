@extends('layouts.app')

@section('content')
<h1>All Games</h1>

<div class="category-filter">
    <button class="filter-btn active" data-category="all">All Games</button>
    <button class="filter-btn" data-category="windows">Windows</button>
    <button class="filter-btn" data-category="console">Console</button>
    <button class="filter-btn" data-category="handheld">Handheld</button>
</div>

<div class="products-grid">
    <!-- Windows Games -->
    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co2x8c.jpg" alt="Cyberpunk 2077">
        <h3>Cyberpunk 2077</h3>
        <p class="category">Windows</p>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="1" data-name="Cyberpunk 2077" data-price="49.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co49wj.jpg" alt="Grand Theft Auto V">
        <h3>GTA V</h3>
        <p class="category">Windows</p>
        <p class="price">$29.99</p>
        <button class="add-to-cart" data-id="2" data-name="GTA V" data-price="29.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2d.jpg" alt="Half-Life: Alyx">
        <h3>Half-Life: Alyx</h3>
        <p class="category">Windows</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="3" data-name="Half-Life: Alyx" data-price="59.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4k7m.jpg" alt="The Witcher 3">
        <h3>The Witcher 3</h3>
        <p class="category">Windows</p>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="4" data-name="The Witcher 3" data-price="39.99">Add to Cart</button>
    </div>

    <!-- Console Games -->
    <div class="product-card" data-category="console">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jni.jpg" alt="God of War">
        <h3>God of War</h3>
        <p class="category">Console</p>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="5" data-name="God of War" data-price="49.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="console">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p3d.jpg" alt="The Last of Us Part II">
        <h3>The Last of Us Part II</h3>
        <p class="category">Console</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="6" data-name="The Last of Us Part II" data-price="59.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="console">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jnh.jpg" alt="Spider-Man: Miles Morales">
        <h3>Spider-Man: Miles Morales</h3>
        <p class="category">Console</p>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="7" data-name="Spider-Man: Miles Morales" data-price="49.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="console">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p3c.jpg" alt="Halo Infinite">
        <h3>Halo Infinite</h3>
        <p class="category">Console</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="8" data-name="Halo Infinite" data-price="59.99">Add to Cart</button>
    </div>

    <!-- Handheld Games -->
    <div class="product-card" data-category="handheld">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2f.jpg" alt="The Legend of Zelda: Breath of the Wild">
        <h3>Zelda: Breath of the Wild</h3>
        <p class="category">Handheld</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="9" data-name="Zelda: Breath of the Wild" data-price="59.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="handheld">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jnj.jpg" alt="Animal Crossing: New Horizons">
        <h3>Animal Crossing</h3>
        <p class="category">Handheld</p>
        <p class="price">$54.99</p>
        <button class="add-to-cart" data-id="10" data-name="Animal Crossing" data-price="54.99">Add to Cart</button>
    </div>
    
    <div class="product-card" data-category="handheld">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2e.jpg" alt="Pokémon Legends: Arceus">
        <h3>Pokémon Legends: Arceus</h3>
        <p class="category">Handheld</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="11" data-name="Pokémon Legends: Arceus" data-price="59.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="handheld">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jnf.jpg" alt="Super Mario Odyssey">
        <h3>Super Mario Odyssey</h3>
        <p class="category">Handheld</p>
        <p class="price">$49.99</p>
        <button class="add-to-cart" data-id="12" data-name="Super Mario Odyssey" data-price="49.99">Add to Cart</button>
    </div>

    <!-- More Popular Games -->
    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jng.jpg" alt="Elden Ring">
        <h3>Elden Ring</h3>
        <p class="category">Windows</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="13" data-name="Elden Ring" data-price="59.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="console">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p3b.jpg" alt="Horizon Forbidden West">
        <h3>Horizon Forbidden West</h3>
        <p class="category">Console</p>
        <p class="price">$69.99</p>
        <button class="add-to-cart" data-id="14" data-name="Horizon Forbidden West" data-price="69.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="handheld">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co3p2g.jpg" alt="Metroid Dread">
        <h3>Metroid Dread</h3>
        <p class="category">Handheld</p>
        <p class="price">$59.99</p>
        <button class="add-to-cart" data-id="15" data-name="Metroid Dread" data-price="59.99">Add to Cart</button>
    </div>

    <div class="product-card" data-category="windows">
        <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co4jnm.jpg" alt="Doom Eternal">
        <h3>Doom Eternal</h3>
        <p class="category">Windows</p>
        <p class="price">$39.99</p>
        <button class="add-to-cart" data-id="16" data-name="Doom Eternal" data-price="39.99">Add to Cart</button>
    </div>
</div>
@endsection