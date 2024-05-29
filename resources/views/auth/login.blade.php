@extends('layouts.app')

@section('title', 'Login')

@section('content')


    <form class="login_form" method="POST" action="{{ route('post.login') }}">
        @csrf
        <div class="background">
            @if($errors->any())
                {{ dd($errors) }}
            @endif
            <h3>Sign in here</h3>
    
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="name@gmail.com" id="email">
    
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
    
    
            <button type="submit">{{ __('Login') }}</button>
            <p class="text-muted">Don't have account? <a href="{{ route('register') }}">Register now</a></p>
        </div>
    </form>
@endsection