<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function users() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function delete(string $id)
    {
        User::destroy($id);
        return redirect()->route('admin.users')->with('success', 'Deleted');
    }
}
