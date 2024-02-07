<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kabupaten;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('login', [
            'title' => 'login',
            "kabupatens" => Kabupaten::all(),
            "sekolahs" => Sekolah::all()
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            // Menghindari kejahatan session fix session -> generate session
            $request->session()->regenerate();

            return redirect()->intended('/');
        }


        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
