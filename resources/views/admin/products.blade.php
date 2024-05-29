@extends('layouts.admin')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="admin-products">
        <section>
            <!--for demo wrap-->
            <h1>Products</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="tbl-content">
              <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach($products as $product) 
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->desc }}</td>
                            <td>{{ $product->price }}$</td>
                            
                            <td>
                                <div class="">
                                    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                                    <form method="POST" action={{ route('products.destroy', $product->id) }}>
                                        @csrf
                                        @method('delete')
                                        <button>Delete</button>
                                    </form>
                                </div>
                                
                            </td>
                        </tr>
                    @endforeach
                  
                </tbody>
              </table>
            </div>
          </section>
    </div>
@endsection