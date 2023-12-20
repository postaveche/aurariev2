<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('/product/{slug}', [ProductController::class, 'product'])->name('product');

Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('categories');
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'category'])->name('category');
Route::get('/tags', [\App\Http\Controllers\TagsController::class, 'index'])->name('tagindex');
Route::get('/tags/{slug}', [\App\Http\Controllers\TagsController::class, 'showtag'])->name('showtag');
Route::post('/addtocart', [\App\Http\Controllers\CartController::class, 'addtocart'])->name('addtocart');
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'show_card'])->name('show_card');
Route::post('/cart/update/{id}', [\App\Http\Controllers\CartController::class, 'update_cantitate'])->name('update_cantitate');
Route::delete('/cart/remove/{id}', [\App\Http\Controllers\CartController::class, 'product_remove'])->name('product_remove_cart');

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admincp', [\App\Http\Controllers\admin\HomeController::class, 'index'])->middleware('auth')->name('admincp');

Route::resource('admincp/categories', \App\Http\Controllers\admin\CategoriesController::class);
Route::resource('admincp/products', \App\Http\Controllers\admin\ProductsController::class);
Route::resource('admincp/tags', \App\Http\Controllers\admin\TagsController::class);

