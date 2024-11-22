<?php

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;


Route::get('/', [Homecontroller::class, 'dashboard']);
Route::get('/user', [Homecontroller::class, 'index'])->name('user.index');
Route::get('/create', [Homecontroller::class, 'create']) -> name('user.create');
Route::post('/store', [Homecontroller::class, 'store']) -> name('user.store');


Route::get('/edit/{id}', [Homecontroller::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [Homecontroller::class, 'update']) -> name('user.update');


Route::delete('/delete/{id}', [Homecontroller::class, 'destroy'])->name('user.destroy');


