<header class="bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark container">
        <a class="navbar-brand fw-bold" href="/">OmniPlay</a>

        <!-- Mobile menu button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}">🏠 Home</a>
                </li>
                <li class="nav-item">
                    <a href="/products" class="nav-link {{ request()->is('products*') ? 'active fw-bold' : '' }}">🎮 Games</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active fw-bold' : '' }}">ℹ️ About</a>
                </li>
                <li class="nav-item">
                    <a href="/cart" class="nav-link {{ request()->is('cart') ? 'active fw-bold' : '' }}">
                        🛒 Cart (<span id="cart-count">0</span>)
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
