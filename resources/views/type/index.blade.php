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
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        @foreach($types as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="">

                                        <form method="POST" action={{ route('type.destroy', $category->id) }}>
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
