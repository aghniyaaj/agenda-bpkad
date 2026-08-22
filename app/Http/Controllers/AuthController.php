<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->input('login'),
            'password' => $request->input('password')
        ];

        // Coba login berdasarkan email (karena 'admin' disimpan di kolom email)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }
        
        // Fallback: coba login berdasarkan nama jika gagal (opsional)
        $credentialsByName = [
            'name' => $request->input('login'),
            'password' => $request->input('password')
        ];
        
        if (Auth::attempt($credentialsByName)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'login' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
