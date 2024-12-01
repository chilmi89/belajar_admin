<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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

    public function register()
    {
        return view('register'); // Pastikan Anda memiliki file `resources/views/register.blade.php`
    }

    public function prosesRegister(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|min:8|confirmed',
        ]);

        // Buat user baru
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}



