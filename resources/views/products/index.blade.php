@extends('layouts.main')

@section('title', 'Products')

@section('content')
  
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
<div class="product-offset">
  <div class="product-filters">
    <div class="search-container">
      <form class="search-form">
        <input class="search-input" name="q" type="search" placeholder="Search...">
        <button class="search-button" type="submit">Search</button>
      </form>
    </div>
    <div class="filters">
      <select id="categories">
        <option>Psi</option>
        <option>Macke</option>
        <option>Ostalo</option>
      </select>
      <select id="categories">
        <option>Hrana</option>
        <option>Igracke</option>
        <option>Nega</option>
      </select>
    </div>
  </div>
  <div class="products-container">
    <div class="product-cards">
      @foreach($products as $product)
        <div class="product-card">
          <img src="{{ asset('storage') }}/images/products/{{ $product->img }}" alt="{{ $product->name }}" class="product-image">
          <div class="product-details">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->desc }}</p>
            <p>{{ $product->price }}</p>
          </div>
          <form class="cart-btn-container" method="POST" action="{{ route('cart.store') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}" />
            <button class="add-cart">
              Add to cart
            </button>
          </form>
          
        </div>
      @endforeach
    </div>
  </div>
</div>
  

<div class="nav-links">
  {{ $products->links() }}
</div>

@endsection