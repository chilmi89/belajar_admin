<?php

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [Homecontroller::class, 'dashboard']);
Route::get('/user', [Homecontroller::class, 'index'])->name('user.index');
Route::get('/create', [Homecontroller::class, 'create']) -> name('user.create');
Route::post('/store', [Homecontroller::class, 'store']) -> name('user.store');
