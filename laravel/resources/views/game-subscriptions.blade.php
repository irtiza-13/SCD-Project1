@extends('layouts.app')

@section('title', 'Game Subscriptions - GameHub')

@section('content')
<section class="py-12 bg-gray-900">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center mb-12 text-white">Game Subscriptions</h1>

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

        <!-- Filter Section -->
        <div class="filters-row mb-8">


            <div class="filter-group">
                <label class="block text-gray-300 text-sm font-medium mb-2"></label>

            </div>
        </div>

        <!-- Subscriptions Grid -->
        <div class="products-grid">

            @foreach ($subscriptions as $subscription)
                <div class="product-card bg-gray-800 p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-700"
                    data-category="{{ $subscription->category }}"
                    data-price="{{ $subscription->price }}"
                    data-rating="{{ $subscription->rating ?? 0 }}"
                    data-name="{{ $subscription->name }}"
                    data-duration="{{ $subscription->duration_days }}"
                    data-featured="{{ $subscription->is_featured ? '1' : '0' }}">

                    <!-- Featured Badge -->
                    @if($subscription->is_featured)
                        <div class="absolute top-4 right-4 bg-yellow-500 text-black px-3 py-1 rounded-full text-sm font-bold">
                            FEATURED
                        </div>
                    @endif

                    <!-- Game Image -->
                    <div class="image-container mb-6 overflow-hidden rounded-lg">
                        <img 
                            src="{{ $subscription->image_url ?: 'https://via.placeholder.com/400x225/374151/FFFFFF?text=Game+Image' }}"
                            alt="{{ $subscription->name }}"
                            class="w-full h-56 object-cover hover:scale-105 transition duration-300"
                        >
                    </div>

                    <!-- Subscription Name -->
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $subscription->name }}</h3>

                    <!-- Description -->
                    <p class="description text-gray-300 text-sm mb-4 line-clamp-2">
                        {{ $subscription->description ?? 'No description available.' }}
                    </p>

                    <!-- Category -->
                    <div class="mb-4">
                        <span class="category inline-block bg-gray-700 text-indigo-300 px-3 py-1 rounded-full text-sm">
                            {{ $subscription->category }}
                        </span>
                    </div>

                    <!-- Rating (if available) -->
                    @if(isset($subscription->rating))
                    <div class="rating mb-4">
                        <div class="flex items-center">
                            <div class="text-yellow-400 mr-2">
                                ⭐⭐⭐⭐⭐
                            </div>
                            <span class="rating-text text-gray-300 text-sm">{{ number_format($subscription->rating, 1) }}/5</span>
                        </div>
                    </div>
                    @endif

                    <!-- Features -->
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-gray-300">
                            <i class="fas fa-clock text-indigo-400 mr-2"></i>
                            <span>{{ $subscription->duration_days }} Days Access</span>
                        </div>
                        @if($subscription->max_players)
                            <div class="flex items-center text-gray-300">
                                <i class="fas fa-users text-indigo-400 mr-2"></i>
                                <span>Up to {{ $subscription->max_players }} Players</span>
                            </div>
                        @endif
                    </div>

                    <!-- Price -->
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <p class="price text-3xl font-bold text-green-400">
                                ${{ number_format($subscription->price, 2) }}
                            </p>
                            <p class="text-gray-400 text-sm">One-time payment</p>
                        </div>
                    </div>

                    <!-- Subscribe Button -->
                    <button 
                        class="add-to-cart w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 rounded-lg font-bold hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-1"
                        data-id="{{ $subscription->id }}"
                        data-name="{{ $subscription->name }}"
                        data-price="{{ $subscription->price }}"
                        data-image="{{ $subscription->image_url }}"
                    >
                        <i class="fas fa-gamepad mr-2"></i>Subscribe Now
                    </button>

                </div>
            @endforeach

        </div>

        @if($subscriptions->isEmpty())
            <div class="text-center py-12">
                <i class="fas fa-gamepad text-6xl text-gray-600 mb-4"></i>
                <h3 class="text-2xl text-gray-400">No subscriptions available at the moment.</h3>
            </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
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

    // Add to cart functionality
    const buttons = document.querySelectorAll('.add-to-cart');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {
            const id = this.dataset.id;
            const name = this.dataset.name;
            const price = parseFloat(this.dataset.price);
            const image = this.dataset.image;

            let cart = loadCart();

            let existing = cart.find(item => item.id === id);

            if (existing) {
                existing.quantity += 1;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    image: image,
                    quantity: 1,
                    type: 'subscription'
                });
            }

            saveCart(cart);

            flash(name + " added to cart!");
        });
    });

    // Filter and sort functionality
    const priceFilter = document.getElementById('price-filter');
    const ratingFilter = document.getElementById('rating-filter');
    const sortBy = document.getElementById('sort-by');
    const productCards = document.querySelectorAll('.product-card');

    function filterAndSortProducts() {
        const priceRange = priceFilter.value;
        const minRating = parseFloat(ratingFilter.value);
        const sortMethod = sortBy.value;
        
        let filteredCards = Array.from(productCards);
        
        // Apply price filter
        if (priceRange !== 'all') {
            const [min, max] = priceRange.split('-').map(Number);
            filteredCards = filteredCards.filter(card => {
                const price = parseFloat(card.dataset.price);
                if (priceRange === '60-100') {
                    return price >= 60 && price <= 100;
                }
                return price >= min && price < max;
            });
        }
        
        // Apply rating filter
        if (minRating > 0) {
            filteredCards = filteredCards.filter(card => {
                const rating = parseFloat(card.dataset.rating);
                return rating >= minRating;
            });
        }
        
        // Sort products
        filteredCards.sort((a, b) => {
            switch(sortMethod) {
                case 'price-low':
                    return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                case 'price-high':
                    return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                case 'rating':
                    return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                case 'name':
                    return a.dataset.name.localeCompare(b.dataset.name);
                case 'featured':
                default:
                    if (a.dataset.featured === '1' && b.dataset.featured !== '1') return -1;
                    if (a.dataset.featured !== '1' && b.dataset.featured === '1') return 1;
                    return 0;
            }
        });
        
        // Hide all cards first
        productCards.forEach(card => {
            card.style.display = 'none';
        });
        
        // Show filtered and sorted cards
        filteredCards.forEach(card => {
            card.style.display = 'block';
        });
    }
    
    // Add event listeners to filters
    [priceFilter, ratingFilter, sortBy].forEach(filter => {
        filter.addEventListener('change', filterAndSortProducts);
    });
});
</script>
@endpush

@push('styles')
<style>
    .filters-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .filter-group {
        display: flex;
        flex-direction: column;
    }
    
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
    }
    
    .product-card {
        position: relative;
        transition: all 0.3s ease;
    }
    
    .product-card:hover {
        border-color: #4f46e5;
        transform: translateY(-5px);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .filter-select:focus {
        outline: none;
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
    }
</style>
@endpush