<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // Memproses login
    public function proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,

        ];
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect jika login berhasil
            return redirect()->route('user.index')->with('success', 'Login berhasil.');
        }else{
            return redirect()->route('login')-> back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->withInput($request->except('password'));
        }


        // Kembalikan ke halaman login dengan pesan error

    }
}
