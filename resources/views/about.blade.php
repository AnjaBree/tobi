@extends('layouts.main')

@section('title', 'about')

@section('content')
  <section class="hero">
    <div class="hero-content">
        <div class="text-content">
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
        <div class="circle"><img src="{{ asset('img/5112780.png') }}" alt="Logo Image"></div>
        <h3 class="kupci">Zadovoljnih kupaca</h3>
        <p class="kupci broj">100.000</p>
    </div>
    <div class="circle-container">
        <div class="circle"><img src="{{ asset('img/Pet shop seller selling vet goods for animals.jpg') }}" alt="Logo Image"></div>
        <h3 class="kupci">Prodanih proizvoda</h3>
        <p class="broj">93.988.123</p>
    </div>
    <div class="circle-container">
        <div class="circle"><img src="{{ asset('img/6193714.png') }}" alt="Logo Image"></div>
        <h3 class="kupci">Zaposlenih</h3>
        <p class="broj">139</p>
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
