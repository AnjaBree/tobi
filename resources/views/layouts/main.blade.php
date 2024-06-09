<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>@yield('title') | Pet shop</title>

    @vite(['resources/css/main.css', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
    <section class="header">

        <nav class="navbar">
            <div class="nav">
                <div class="branding">
                    <a href="#" class="logo">
                        <img src="{{ asset('img/logo1.png') }}" alt="TOBI">
                        <p>TOBI</p>
                    </a>
                </div>
                <div id="menu-btn" class="btn"><i class="fas fa-bars"></i></div>
                <div class="links">
                    <div class="nav-links">
                        <ul class="nav-items">
                            <li class="nav-item  {{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                            <li class="nav-item  {{ Route::is('products.index') ? 'active' : '' }}"><a href="{{ route('products.index') }}">Products</a></li>
                            <li class="nav-item  {{ Route::is('about') ? 'active' : '' }}"><a href="{{ route('about') }}">About</a></li>
                            <li class="nav-item"><a href="{{ route("about") }}#contact">Contact</a></li>
                            @if(auth()->check() && Auth::user()->role == "admin")
                                <li class="nav-item"><a href="{{ route('admin.products') }}">Admin</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="user-nav">
                        @if(auth()->check())
                            <a href="{{ route('cart.index') }}" class="cart  {{ Route::is('cart.index') ? 'active' : '' }}">
                                <i class="fas fa-shopping-cart"></i>
                                <div class="badge">
                                    {{ $cart_count }}
                                </div>
                            </a>
                            <form class="user-profile" method="POST" action="{{ route('logout') }}">
                                @csrf

                                <div class="logout">
                                    <button type="submit">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </button>
                                </div>
                            </form>
                        @else
                        <ul class="nav-items">
                            <li class="nav-item"><a href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}">Register</a></li>

                        </ul>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </nav>
    </section>
    @yield('content')
</body>
</html>
