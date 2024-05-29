@extends('layouts.app')
@section('title', 'Register')

@section('content')
    @if($errors->any())
        {{ dd($errors) }}
    @endif
    <form class="login_form" method="POST" action="{{ route('post.register') }}">
        @csrf
        <div class="background">
            <h3>Register </h3>

        <label for="name">Name</label>
        <input type="name" name="name" placeholder="name" id="name"  value="{{ old('name') }}"/>


        <label for="email">Email</label>
        <input type="email" name="email" placeholder="name@email.com" id="email" value="{{ old('email') }}" />

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="1234" id="password"/>

        <button type="submit">{{ __('Register') }}</button>
        <p class="text-muted">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
    </form>
@endsection
