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
        }else {
            // Redirect jika login gagal, dengan pesan error
            return redirect()
                ->route('login')
                ->with('error', 'Email atau password salah.');
        }


        // Kembalikan ke halaman login dengan pesan error

    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.proses');
    }

}
