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
                <div class="nav-links">
                    <ul class="nav-items">
                        <li class="nav-item  {{ Route::is('admin.products') ? 'active' : '' }}"><a href="{{ route('admin.products') }}">Product</a></li>
                        <li class="nav-item {{ Route::is('admin.users') ? 'active' : '' }}"><a href="{{ route('admin.users') }}">Users</a></li>
                        <li class="nav-item  {{ Route::is('category.index') ? 'active' : '' }}"><a href="{{ route('category.index') }}">Categories</a></li>
                        <li class="nav-item  {{ Route::is('type.index') ? 'active' : '' }}"><a href="{{ route('type.index') }}">Types</a></li>
                        <li class="nav-item  {{ Route::is('products.create') ? 'active' : '' }}"><a href="{{ route('products.create') }}">Add Product</a></li>
                        <li class="nav-item  {{ Route::is('type.create') ? 'active' : '' }}"><a href="{{ route('type.create') }}">Add Type</a></li>
                        <li class="nav-item  {{ Route::is('category.create') ? 'active' : '' }}"><a href="{{ route('category.create') }}">Add Category</a></li>
                        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}"><a href="{{ route('home') }}">To Site</a></li>
                    </ul>
                </div>
                <div class="user-nav">

                    <form class="user-profile" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="logout">
                            <button type="submit">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </button>
                        </div>
                    </form>
                </div>

                </div>
            </div>

        </nav>
    </section>
    @yield('content')
</body>
</html>
