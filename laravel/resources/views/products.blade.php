@extends('layouts.app')

@section('content')
<h1>All Games</h1>

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
                data-price="{{ $p->price }}">
            Add to Cart
        </button>
        
    </div>
    @endforeach

</div>

@endsection
