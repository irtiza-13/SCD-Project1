@extends('layouts.app')

@section('content')
<h1>All Games</h1>

{{-- Flash Message --}}
<div id="flash-message" style="
    display:none;
    position: fixed;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 12px 20px;
    border-radius: 6px;
    font-weight: bold;
    z-index: 9999;
">
</div>

<div class="filters-row">
    <div class="filter-group">
        <label>Price Range:</label>
        <select id="price-filter" class="filter-select">
            <option value="all">All Prices</option>
            <option value="0-25">Under $25</option>
            <option value="25-40">$25 - $40</option>
            <option value="40-60">$40 - $60</option>
            <option value="60-100">$60+</option>
        </select>
    </div>

    <div class="filter-group">
        <label>Minimum Rating:</label>
        <select id="rating-filter" class="filter-select">
            <option value="0">All Ratings</option>
            <option value="4">4+ Stars</option>
            <option value="3">3+ Stars</option>
            <option value="2">2+ Stars</option>
        </select>
    </div>

    <div class="filter-group">
        <label>Sort By:</label>
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

    @foreach($products as $p)
    <div class="product-card"
        data-category="{{ $p->category }}"
        data-price="{{ $p->price }}"
        data-rating="{{ $p->rating }}"
        data-name="{{ $p->name }}">

        <img src="{{ $p->image }}" alt="{{ $p->name }}">

        <h3>{{ $p->name }}</h3>

        <p class="description">{{ $p->description }}</p>

        <p class="category">{{ $p->category }}</p>

        <div class="rating">
            ⭐⭐⭐⭐⭐ <span class="rating-text">{{ $p->rating }}/5</span>
        </div>

        <p class="price">${{ number_format($p->price, 2) }}</p>

        <button class="add-to-cart"
                data-id="{{ $p->id }}"
                data-name="{{ $p->name }}"
                data-price="{{ $p->price }}"
                data-image="{{ $p->image }}">
            Add to Cart
        </button>
        
    </div>
    @endforeach

</div>
@endsection


@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {

    function loadCart() {
        let cart = localStorage.getItem("cart");
        return cart ? JSON.parse(cart) : [];
    }

    function saveCart(cart) {
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    function flash(message) {
        const flashBox = document.getElementById('flash-message');
        flashBox.textContent = message;
        flashBox.style.display = 'block';

        setTimeout(() => {
            flashBox.style.display = 'none';
        }, 2000);
    }

    const buttons = document.querySelectorAll('.add-to-cart');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {

            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);
            const image = this.dataset.image;   // <-- FIXED (image stored)

            let cart = loadCart();

            let existing = cart.find(item => item.id === id);

            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    image: image, // <-- FIXED
                    quantity: 1
                });
            }

            saveCart(cart);

            flash(name + " added to cart!");
        });
    });

});
</script>
@endsection
