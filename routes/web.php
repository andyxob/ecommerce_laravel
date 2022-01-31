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



Route::get('/', [\App\Http\Controllers\MainController::class , 'index'])->name("home");

Route::get('/categories', [\App\Http\Controllers\MainController::class, 'categories'])->name('categories');

Route::get('/categories/{category?}', [\App\Http\Controllers\MainController::class, 'category'])->name('category');

Route::get('/basket/order', [\App\Http\Controllers\BasketController::class, 'order'])->name('order');

Route::get('/basket', [\App\Http\Controllers\BasketController::class, 'basket'])->name('basket');

Route::post('/basket/add/{id}' , [\App\Http\Controllers\BasketController::class , 'basketAdd'])->name('basket_add');

Route::post('/basket/remove/{id}' , [\App\Http\Controllers\BasketController::class , 'basketRemove'])->name('basket_remove');

Route::post('/basket/order/confirm' , [\App\Http\Controllers\BasketController::class, 'orderConfirm'])->name('order_confirm');

Route::get('{category}/{product?}', [\App\Http\Controllers\MainController::class , 'product'])->name('product');

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);





