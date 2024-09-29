<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerControllers;
Route::get('/', [CustomerControllers::class, 'index'])->name('index');

Route::get('/', function () {
    return view('welcome');
});


