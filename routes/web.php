<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admincp', [\App\Http\Controllers\admin\HomeController::class, 'index'])->middleware('auth')->name('admincp');

Route::resource('admincp/categories', \App\Http\Controllers\admin\CategoriesController::class);
Route::resource('admincp/products', \App\Http\Controllers\admin\ProductsController::class);
