<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'adresse' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $response = Password::sendResetLink($request->only('email'));

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', __($response));
        }

        return back()->withErrors(['email' => __($response)]);
    }
}

