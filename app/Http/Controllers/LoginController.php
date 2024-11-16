<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib di isi !',
                'password.required' => 'Password wajib di isi !',
            ]
        );

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin, $request->filled('remember'))) {
            $user = Auth::user();
            switch ($user->role) {
                case 'Admin':
                    return redirect()->intended('/admin/dashboard');
                    break;
                case 'Staff Gudang':
                    return redirect()->intended('/staff-gudang/dashboard');
                    break;
                case 'Manajer Gudang':
                    return redirect()->intended('/manajer-gudang/dashboard');
                    break;
                default:
                    return redirect()->intended('/dashboard');
            }
        } else {
            $errors = new \Illuminate\Support\MessageBag();

            if (!Auth::validate($infologin)) {
                if (!User::where('email', $request->email)->exists()) {
                    $errors->add('email', 'Email tidak ditemukan.');
                } else {
                    $errors->add('password', 'Password salah.');
                }
            }

            return redirect('/')->withErrors($errors)->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'Successfully logged out!');
    }
}
