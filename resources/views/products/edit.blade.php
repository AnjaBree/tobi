@extends('layouts.admin')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="create-wrapper">
        <div class="create-card">

            <div class="card-header">
                <h1>Edit Product</h1>
            </div>

            @if(session('error'))
            <h1>{{ session('error') }}</h1>
            @endif



            <div class="card-body">
                <form class="product-form" method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-container">
                        <label>Name</label>
                        <input class="product-input" type="text" name="name" placeholder="Name" value="{{ $product->name }}" />
                    </div>
                    <div class="input-container">
                        <label>Description</label>
                        <input class="product-input" type="text" name="desc" placeholder="Description" value="{{ $product->desc }}" />
                    </div>
                    <div class="input-container">
                        <label>Price</label>
                        <input class="product-input" type="number" name="price" placeholder="Price" value="{{ $product->price }}" />
                    </div>
                    

                    <div class="btn-container">
                        <button class="save-product-btn">
                            Save product
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection