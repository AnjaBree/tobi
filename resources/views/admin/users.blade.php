@extends('layouts.admin')

@section('title', 'About')

@section('head')
    @vite(['resources/css/main.css'])
@endsection

@section('content')
    <div class="admin-products">
        <section>
           
            <h1>Products</h1>
            <div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    
                    <th>Actions</th>
                  </tr>
                </thead>
              </table>
            </div>
            <div class="tbl-content">
              <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach($users as $user) 
                        <tr>
                            <td>{{ $user->name }}</td>
                            
                            
                            <td>
                                <div class="">
                                    
                                    <form method="POST" action={{ route('admin.delete', $user->id) }}>
                                        @csrf
                                        @method('delete')
                                        <button class="delete-button">
                                          <i class="fa-solid fa-trash"></i>
                                        </button>
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