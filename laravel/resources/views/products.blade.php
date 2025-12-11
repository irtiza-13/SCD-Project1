@extends('layouts.app')

@section('content')
<h1>All Games</h1>

{{-- Search Bar --}}
<div class="search-container">
    <input type="text" 
           id="search-bar" 
           placeholder="Search by name or category..."
           autocomplete="off">
    <div id="search-results" class="search-results-dropdown"></div>
</div>

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
        data-id="{{ $p->id }}"
        data-category="{{ $p->category }}"
        data-price="{{ $p->price }}"
        data-rating="{{ $p->rating }}"
        data-name="{{ strtolower($p->name) }}">

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
    // Search functionality
    const searchBar = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');
    const productsGrid = document.querySelector('.products-grid');
    let searchTimeout = null;
    let lastHighlightedProduct = null;

    // Load and save cart functions
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

    // Function to highlight a product in the grid
    function highlightProduct(productId) {
        // Remove highlight from previously highlighted product
        if (lastHighlightedProduct) {
            lastHighlightedProduct.classList.remove('highlighted');
        }
        
        // Find and highlight the new product
        const productCard = document.querySelector(`.product-card[data-id="${productId}"]`);
        if (productCard) {
            productCard.classList.add('highlighted');
            lastHighlightedProduct = productCard;
            
            // Scroll to the highlighted product
            productCard.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
            
            // Remove highlight after 3 seconds
            setTimeout(() => {
                productCard.classList.remove('highlighted');
                lastHighlightedProduct = null;
            }, 3000);
        }
    }

    // Search function
    function performSearch(query) {
        if (query.length < 2) {
            searchResults.innerHTML = '';
            searchResults.style.display = 'none';
            
            // Show all products when search is cleared
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'block';
            });
            return;
        }

        // First, filter visible products locally for immediate feedback
        filterProductsLocally(query);

        // Then make AJAX call for more accurate results
        fetch('/search', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ query: query })
        })
        .then(response => response.json())
        .then(data => {
            displaySearchResults(data);
        })
        .catch(error => {
            console.error('Search error:', error);
        });
    }

    // Local filtering for immediate feedback
    function filterProductsLocally(query) {
        const searchTerm = query.toLowerCase();
        const productCards = document.querySelectorAll('.product-card');
        
        productCards.forEach(card => {
            const name = card.dataset.name;
            const category = card.dataset.category.toLowerCase();
            
            if (name.includes(searchTerm) || category.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function displaySearchResults(results) {
        searchResults.innerHTML = '';
        
        if (results.length === 0) {
            searchResults.innerHTML = '<div class="search-result-item">No results found</div>';
            searchResults.style.display = 'block';
            return;
        }

        results.forEach(product => {
            const resultItem = document.createElement('div');
            resultItem.className = 'search-result-item';
            resultItem.dataset.productId = product.id;
            
            resultItem.innerHTML = `
                <div class="search-result-content">
                    <img src="${product.image}" alt="${product.name}" class="search-result-image">
                    <div class="search-result-info">
                        <h4>${product.name}</h4>
                        <p class="search-category">${product.category}</p>
                        <p class="search-price">$${parseFloat(product.price).toFixed(2)}</p>
                        <span class="search-rating">⭐ ${product.rating}/5</span>
                    </div>
                </div>
                <div class="search-result-hint">Click to highlight in grid</div>
            `;
            
            resultItem.addEventListener('click', () => {
                highlightProduct(product.id);
                searchResults.style.display = 'none';
                searchBar.value = product.name; // Optional: fill search with product name
            });
            
            searchResults.appendChild(resultItem);
        });
        
        searchResults.style.display = 'block';
    }

    // Event listener for search
    searchBar.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();
        
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!searchBar.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Add to cart functionality
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-to-cart')) {
            const id = event.target.dataset.id;
            const name = event.target.dataset.name;
            const price = parseFloat(event.target.dataset.price);
            const image = event.target.dataset.image;

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
                    quantity: 1
                });
            }

            saveCart(cart);
            flash(name + " added to cart!");
        }
    });

    // Clear search when escape key is pressed
    searchBar.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            this.value = '';
            searchResults.style.display = 'none';
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.display = 'block';
                card.classList.remove('highlighted');
            });
        }
    });
});
</script>

<style>
.search-container {
    position: relative;
    max-width: 500px;
    margin: 20px 0;
}

#search-bar {
    width: 100%;
    padding: 12px 16px;
    font-size: 16px;
    border: 2px solid #ddd;
    border-radius: 8px;
    outline: none;
    transition: border-color 0.3s;
}

#search-bar:focus {
    border-color: #007bff;
}

.search-results-dropdown {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    max-height: 400px;
    overflow-y: auto;
    z-index: 1000;
    margin-top: 5px;
}

.search-result-item {
    padding: 12px 16px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background-color 0.2s;
}

.search-result-item:hover {
    background-color: #f0f7ff;
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-content {
    display: flex;
    align-items: center;
    gap: 12px;
}

.search-result-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
}

.search-result-info h4 {
    margin: 0 0 4px 0;
    font-size: 14px;
    color: #333;
}

.search-category {
    margin: 0 0 4px 0;
    font-size: 12px;
    color: #666;
    background: #f0f0f0;
    padding: 2px 6px;
    border-radius: 4px;
    display: inline-block;
}

.search-price {
    margin: 0;
    font-size: 14px;
    font-weight: bold;
    color: #28a745;
}

.search-rating {
    font-size: 12px;
    color: #ffc107;
    margin-left: 8px;
}

.search-result-hint {
    font-size: 11px;
    color: #666;
    margin-top: 4px;
    font-style: italic;
}

/* Highlight animation for products */
.product-card {
    transition: all 0.3s ease;
    position: relative;
}

.product-card.highlighted {
    animation: highlightPulse 2s ease-in-out;
    border: 3px solid #007bff;
    box-shadow: 0 0 20px rgba(0, 123, 255, 0.4);
    transform: scale(1.02);
    z-index: 10;
}

@keyframes highlightPulse {
    0% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
        transform: scale(1);
    }
    50% {
        box-shadow: 0 0 0 15px rgba(0, 123, 255, 0);
        transform: scale(1.03);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
        transform: scale(1.02);
    }
}

.product-card.highlighted::before {
    content: "✓ Found!";
    position: absolute;
    top: -15px;
    right: -10px;
    background: #007bff;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: bold;
    z-index: 11;
    animation: fadeInOut 3s ease-in-out;
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0; }
    20%, 80% { opacity: 1; }
}
</style>
@endsection