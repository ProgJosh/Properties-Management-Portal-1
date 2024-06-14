<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\LoginController;

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


//Admin Routes


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [LoginController::class, 'register'])->name('register');
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware(['auth:admin']);
});
