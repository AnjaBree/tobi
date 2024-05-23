<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

// input name="email" && input name="password" -> POST -> /login
class LoginController extends Controller
{
    public function login(Request $request): RedirectResponse 
    {
        $request->only('email', 'password');

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }

        return redirect('/login')->withErrors([
            'email' => 'Invalid credentials'
        ]);
    
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with('destroyed', true);
    }
}
