<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PropertiesController;
use App\Http\Controllers\Admin\LandlordsController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Frontend\HomeController; 

require_once __DIR__.'/jetstream.php';

Route::get('/', [HomeController::class, 'index']);
Route::get('/properties', [HomeController::class, 'properties'])->name('properties');
Route::get('/property/{id}', [HomeController::class, 'property'])->name('property');

Route::get('properties/{type}', [HomeController::class, 'propertyByType'])->name('propertyByType');



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
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware(['auth:admin']);

//Properties Routes

   Route::get('/properties', [PropertiesController::class, 'index'])->name('properties')->middleware(['auth:admin']);
   Route::get('/property/create', [PropertiesController::class, 'create'])->name('property.create')->middleware(['auth:admin']);
   Route::post('/property/store', [PropertiesController::class, 'store'])->name('property.store')->middleware(['auth:admin']);
    Route::get('/property/edit/{id}', [PropertiesController::class, 'edit'])->name('property.edit')->middleware(['auth:admin']);
    Route::post('/property/update/{id}', [PropertiesController::class, 'update'])->name('property.update')->middleware(['auth:admin']);
    Route::get('/property/delete/{id}', [PropertiesController::class, 'delete'])->name('property.delete')->middleware(['auth:admin']);

    //Users

    Route::get('/landlords', [LandlordsController::class, 'landlords'])->name('landlords')->middleware(['auth:admin']);
    Route::get('/landlord/{id}', [LandlordsController::class, 'SingleLandlordProperties'])->name('single.landlord')->middleware(['auth:admin']);

    Route::get('/tenants', [TenantController::class, 'tenants'])->name('tenants')->middleware(['auth:admin']);
});
