<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['logout' => false]);

Route::post('/logout', function ()
{
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::prefix('/admin')->middleware('auth')->name("admin.")->group(function() {
    Route::resource('/categories', CategoryController::class)->except('create');
    Route::prefix('/categories')->name('categories.')->group(function () {
        Route::get('{id}/create', [CategoryController::class , 'create'])->name('create');
    });

    Route::resource('products', ProductController::class)->except('show','index');
    Route::get('products', [ProductController::class, 'index'])->name('products.index')->middleware('can:list_product');
    Route::resource('orders', OrderController::class);
    Route::resource('images', ImageController::class)->only('store','destroy');

    Route::post('/images/update' ,[ImageController::class, 'update'])->name('images.update');

    Route::resource('roles', RoleController::class);

    Route::resource('users', UserController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class ,'index'])->name('home');
