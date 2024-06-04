@extends('layouts.admin')

@section('title', 'Category')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="create-wrapper">
        <div class="create-card">

            <div class="card-header">
                <h1>New Category</h1>
            </div>

            @if(session('error'))
                <h1>{{ session('error') }}</h1>
            @endif



            <div class="card-body">
                <form class="product-form" method="POST" action="{{ route('type.store') }}">
                    @csrf
                    <div class="input-container">
                        <label>Name</label>
                        <input class="product-input" type="text" name="name" placeholder="Name" />
                    </div>


                    <div class="btn-container">
                        <button class="save-product-btn">
                            Save new category
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
