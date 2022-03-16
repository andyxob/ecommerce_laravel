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
Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);

Route::middleware(['auth'])->group(function (){
    Route::group([
        'prefix'=>'person',
        'namespace'=>'Person',
        'as'=>'person.'
    ], function (){
        Route::get('/orders', [\App\Http\Controllers\Person\OrderController::class , 'index'])->name('orders.index');
        Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class , 'show'])->name('orders.show');
    });
});

Route::group(['prefix'=>'admin'], function (){
    Route::group(['middleware'=>'is_admin',
        'namespace'=>'Admin' ], function (){
        Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class , 'index'])->name('orders');
        Route::get('/orders/{order}', [\App\Http\Controllers\Admin\OrderController::class , 'show'])->name('orders.show');
    });
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products' , \App\Http\Controllers\Admin\ProductController::class);
});



Route::group(['prefix'=>'basket'], function (){
    Route::post('/add/{id}' , [\App\Http\Controllers\BasketController::class , 'basketAdd'])->name('basket_add');

    Route::group(['middleware'=>'basket_not_empty'], function (){
        Route::get('/', [\App\Http\Controllers\BasketController::class, 'basket'])->name('basket');
        Route::get(  '/order', [\App\Http\Controllers\BasketController::class, 'order'])->name('order');
        Route::post('/remove/{id}' , [\App\Http\Controllers\BasketController::class , 'basketRemove'])->name('basket_remove');
        Route::post('/order/confirm' , [\App\Http\Controllers\BasketController::class, 'orderConfirm'])->name('order_confirm');
    });
});

Route::get('/', [\App\Http\Controllers\MainController::class , 'index'])->name("index");
Route::get('/categories', [\App\Http\Controllers\MainController::class, 'categories'])->name('categories');
Route::get('/categories/{category}', [\App\Http\Controllers\MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [\App\Http\Controllers\MainController::class , 'product'])->name('product');
