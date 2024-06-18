@extends('layouts.main')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css', 'resources/js/app.js'])
@endsection

@section('content')
    <div class="cart-container">
        <!-- Toast -->
        <div id="toast-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
            @if(session('success'))
            <div id="toast" style="min-width: 250px; background-color: #28a745; color: white; padding: 16px; border-radius: 4px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                <span>{{ session('success') }}</span>
                <button onclick="closeToast()" style="background: none; border: none; color: white; float: right; font-size: 20px; line-height: 20px; margin-left: 20px;">&times;</button>
            </div>
            @endif
        </div>
        <div class="cart">
            <h1>My Cart</h1>

            <ul class="cart-list">
                @foreach ($items as $item)
                    <li class="cart-item">
                        <div class="cart-line">
                            <p>{{ $item->product->name }}</p>
                            <p class="quantity-container">{{ $item->quantity }}</p>
                            <p class="price-container">{{ $item->quantity * $item->product->price }}$</p>
                        </div>
                    </li>
                @endforeach
                    <li class="cart-item">
                        <div class="cart-line">
                            <p>Total: </p>
                            <p class="quantity-container"></p>
                            <p class="price-container">
                                {{ $total }}$
                            </p>
                        </div>
                    </li>
            </ul>
            <form class="checkout" method="POST"  action="{{ route("cart.clear") }}">
                
                @csrf
                <button class="checkout-button">
                    Checkout
                </button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => {
                    toast.style.display = 'none';
                }, 3000); // 3 seconds
            }
        });

        function closeToast() {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.style.display = 'none';
            }
        }
    </script>
@endsection