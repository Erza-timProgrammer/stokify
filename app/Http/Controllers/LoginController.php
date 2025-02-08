<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Setting;

class LoginController extends Controller
{
    public function index()
    {
        $setting = Setting::first(); // Ambil data dari database
        return view('login', compact('setting')); // Kirim ke view
    }

    public function login(Request $request)
{
    // Validasi input
    $request->validate(
        [
            'email'    => 'required',
            'password' => 'required',
        ],
        [
            'email.required'    => 'Email wajib di isi !',
            'password.required' => 'Password wajib di isi !',
        ]
    );

    $infologin = [
        'email'    => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($infologin, $request->filled('remember'))) {
        // Catat aktivitas login setelah berhasil login
        ActivityLog::create([
            'user_id'  => auth()->id(),
            'activity' => 'Login',
            'detail'   => 'User berhasil login pada ' . now()->format('Y-m-d H:i:s'),
        ]);

        $user = Auth::user();
        switch ($user->role) {
            case 'Admin':
                return redirect()->intended('/admin/dashboard');
            case 'Staff Gudang':
                return redirect()->intended('/staff-gudang/dashboard');
            case 'Manajer Gudang':
                return redirect()->intended('/manajer-gudang/dashboard');
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
    // Cek apakah user masih terautentikasi sebelum logout
    if (auth()->check()) {
        ActivityLog::create([
            'user_id'  => auth()->id(),
            'activity' => 'Logout',
            'detail'   => 'User berhasil logout pada ' . now()->format('Y-m-d H:i:s'),
        ]);
    }

    // Proses logout
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}
}