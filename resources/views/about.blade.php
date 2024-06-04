@extends('layouts.main')

@section('title', 'about')

@section('content')
  <section class="hero">
    <div class="hero-content">
        <div class="text-cpntent">
            <h2>About us</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget ex vestibulum, 
                feugiat turpis id, aliquam metus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget ex vestibulum, 
                feugiat turpis id, aliquam metus.</p>

            <button>Learn More</button>
        </div>

        <div class="hero-image">
            <img src="{{ asset('img/hi.png') }}" alt="Logo Image">
        </div>
    </div>
    </section>
    <div class="features">
    <div class="circle-container">
        <div class="circle"><img src="{{ asset('img/hero-image.png') }}" alt="Logo Image"></div>
        <h3>Zadovoljnih kupaca</h3>
        <p>61658416146</p>
    </div>
    <div class="circle-container">
        <div class="circle"><img src="{{ asset('img/hero-image.png') }}" alt="Logo Image"></div>
        <h3>Prodanih proizvoda</h3>
        <p>8659521</p>
    </div>
    <div class="circle-container">
        <div class="circle"><img src="{{ asset('img/hero-image.png') }}" alt="Logo Image"></div>
        <h3>Zaposlenih</h3>
        <p>52959595</p>
    </div>

    </div>
    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <form>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </section>

@endsection
