@if($subscriptions->isEmpty())
    <div class="col-span-full text-center py-12">
        <i class="fas fa-gamepad text-6xl text-gray-600 mb-4"></i>
        <h3 class="text-2xl text-gray-400">No subscriptions found.</h3>
    </div>
@else
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
@endif