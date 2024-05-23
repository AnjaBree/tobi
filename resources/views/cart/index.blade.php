@extends('layouts.main')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="cart-container">
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
@endsection