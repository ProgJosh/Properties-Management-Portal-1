<?php

use Illuminate\Support\Facades\Route;

require_once __DIR__.'/jetstream.php';
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        // return view('admin.pages.dashboard');
       return view('dashboard');
       
    })->name('dashboard');
});
