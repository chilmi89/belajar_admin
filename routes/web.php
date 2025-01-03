<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\LoginController;

Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'prosesRegister'])->name('register.proses');



// Route::prefix('admin')->group(function () {
// });

Route::get('/', [Homecontroller::class, 'dashboard']);
Route::get('/user', [Homecontroller::class, 'index'])->name('user.index');
Route::get('/create', [Homecontroller::class, 'create']) -> name('user.create');
Route::post('/store', [Homecontroller::class, 'store']) -> name('user.store');


Route::get('/edit/{id}', [Homecontroller::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [Homecontroller::class, 'update']) -> name('user.update');


Route::delete('/delete/{id}', [Homecontroller::class, 'destroy'])->name('user.destroy');



