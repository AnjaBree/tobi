@extends('layouts.main')

@section('title', 'About')

@section('head')
    @vite(['resources/css/home.css'])
@endsection

@section('content')
<body class="test">

<section class="hero">
    <div class="hero-content">
        <div class="text-content">
            <h1>Welcome to the best pet shop</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tristique, dui sit amet luctus semper, risus felis congue augue, nec pulvinar tellus metus eu metus. Morbi pellentesque ligula non rutrum consequat. Etiam erat libero, ullamcorper tempus eleifend at, vestibulum et mi.
            </p>

            <div class="button-container">
                <div class="button-shop">
                   Shop Now 
                </div>
            </div>
        </div>
        <div class="image-content">
            <img src="{{ asset('img/hero-image.png') }}" alt="Logo Image">
        </div>
    </div>
</section>

<!-- Custom Navbar -->
<nav class="navbar1">
    <ul class="navbar1-nav">
        <li><a href="#"><i class="fas fa-dog"></i> Dog</a></li>
        <li><a href="#"><i class="fas fa-cat"></i> Cat</a></li>
        <li><a href="#"><i class="fas fa-paw"></i> Other animals</a></li>
    </ul>
</nav>
<section class="info-section">
    <div class="info-content">
        <div class="info-item">
            <img src="/img/food.png" alt="Image 1"> <!-- Example image -->
            <h3>Quality pet food</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
            </p>
        </div>
        <div class="info-item">
            <img src="/img/game.png" alt="Image 1"> <!-- Example image -->
            <h3>Quality pet Game</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
            </p>
        </div>
        <div class="info-item">
            <img src="/img/care.png" alt="Image 1"> <!-- Example image -->
            <h3>Quality pet Care</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.
            </p>
        </div>
    </div>
</section>
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h2>About Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus nec nunc lacinia.</p>
        </div>
        <div class="footer-section">
            <h2>Quick Links</h2>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Follow Us</h2>
            <div class="social-media">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>Anja Dragovic 117/2020</p>
    </div>
</footer>

</body>
@endsection
