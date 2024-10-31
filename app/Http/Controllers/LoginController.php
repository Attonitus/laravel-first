<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function auth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required | regex:/(.+)@(.+)\.(.+)/i | string | max:100',
            'password' => 'required | string | min:8'
        ]);

        if (Auth::attempt($credentials)) {
            //regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        //auth fails
        return back()->withErrors([
            'email' => 'Try again. Incorrect email or password.'
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
