<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RailMonitor;


class AuthController extends Controller
{

    public function render_login()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user_params = $request->only((new User)->getFillable());

        if (Auth::attempt(['email' => $user_params['email'], 'password' => $user_params['password']])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        };

        return back()->with('error', 'Username or Password invalid');
    }

    public function register(Request $request)
    {
        \Log::info("message");
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return back()->with('success', 'Register successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login-page');
    }
}
