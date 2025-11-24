<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('/listings/{slug}', [\App\Http\Controllers\ListingController::class, 'lists'])->name('listings.show');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
