<?php

use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Route;


Route::get('/user', [Homecontroller::class, 'index']);
Route::get('/dashboard', [Homecontroller::class, 'dashboard']);