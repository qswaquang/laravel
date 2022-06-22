<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function(){
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::prefix('/admin')->middleware('auth')->name("admin.")->group(function() {
    Route::resource('/categories', CategoryController::class)->except('create');
    Route::prefix('/categories')->name('categories.')->group(function () {
        Route::get('{id}/create', [CategoryController::class , 'create'])->name('create');
    });

    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
