@extends('layouts.admin')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="create-wrapper">
        <div class="create-card">

            <div class="card-header">
                <h1>New Product</h1>
            </div>

            @if(session('error'))
            <h1>{{ session('error') }}</h1>
            @endif



            <div class="card-body">
                <form class="product-form" method="POST" enctype="multipart/form-data" action="{{ route('products.store') }}">
                    @csrf
                    <div class="input-container">
                        <label>Name</label>
                        <input class="product-input" type="text" name="name" placeholder="Name" />
                    </div>
                    <div class="input-container">
                        <label>Description</label>
                        <input class="product-input" type="text" name="desc" placeholder="Description" />
                    </div>
                    <div class="input-container">
                        <label>Price</label>
                        <input class="product-input" type="number" name="price" placeholder="Price" />
                    </div>
                    <div class="input-container">

                        <input name="image" type="file" accept="image/*">
                    </div>

                    <div class="input-container">
                        <select class="product-input" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-container">
                        <select class="product-input" name="type">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-container">
                        <button class="save-product-btn">
                            Save new product
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
