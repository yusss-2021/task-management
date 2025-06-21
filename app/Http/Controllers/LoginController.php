<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showAdminLogin()
    {
        return view('auth.login-admin');
    }

    public function showUserLogin()
    {
        return view('auth.login-user');
    }

    public function login(Request $request)
    {
        // Validasi input dengan pesan kustom
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Email tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ])->onlyInput('email');
        }

        // Password salah
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->onlyInput('email');
        }

        // Login sukses
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect berdasarkan role
        if ($user->role->name === 'admin') {
            return redirect()->intended('/admin/dashboard');
        } elseif ($user->role->name === 'user') {
            return redirect()->intended('/user/dashboard');
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Role tidak dikenali.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
