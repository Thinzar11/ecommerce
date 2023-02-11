<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;

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

Route::get('/',[PageController::class,'index']);
Route::get('/shop',[PageController::class, 'shop']);
Route::get('/category/{id}',[PageController::class,'category']);
Route::get('/cart',[PageController::class,'cart']);
Route::get('whistlist',[PageController::class,'wishlist']);
Route::get('/detail/{id}',[PageController::class,'detail']);
Route::get('/checkout',[PageController::class,'checkout'])->middleware('auth');
Route::get('/contact',[PageController::class,'contact']);
Route::get('/latest',[PageController::class,'latest']);

//checkout
Route::post('/stripCheckout',[CheckoutController::class, 'checkout']);
//cart
Route::post('/addToCart/{id}',[CartController::class,'addToCart'])->middleware('auth');
Route::post('/removeFromCart/{id}',[CartController::class,'removeFromCart'])->middleware('auth');

//wishlist
Route::post('/addtoWishlist/{id}',[WishlistController::class, 'addToWishlist'])->middleware('auth');
Route::post('/removeFromWishlist/{id}',[WishlistController::class, 'removeFromWishlist'])->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'adminpanel','middleware'=>'admin'],function(){
    Route::get('/',[AdminController::class,'index']);

    Route::group(['prefix'=>'products'],function(){
        Route::get('/',[ProductController::class,'index']);
        Route::get('/create',[ProductController::class, 'create']);
        Route::post('/store',[ProductController::class, 'store']);
        Route::get('/delete/{id}',[ProductController::class,'delete']);
        Route::get('/edit/{id}', [ProductController::class,'edit']);
        Route::put('/update/{id}',[ProductController::class,'update']);
    });

    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',[CategoryController::class,'index']);
        Route::post('/create',[CategoryController::class,'create']);
        Route::get('/delete/{id}',[CategoryController::class,'delete']);
        Route::get('/edit/{id}',[CategoryController::class,'edit']);
        Route::put('/update/{id}',[CategoryController::class,'update']);
    });

    Route::group(['prefix'=>'colors'],function(){
        Route::get('/',[ColorController::class,'index']);
        Route::post('/create',[ColorController::class,'create']);
        Route::get('/delete/{id}',[ColorController::class,'delete']);
        Route::get('/edit/{id}',[ColorController::class,'edit']);
    });

    Route::group(['prefix'=>'sizes'],function(){
        Route::get("/",[SizeController::class, 'index']);
        Route::post('/create',[SizeController::class, 'create']);
        Route::get('/delete/{id}',[SizeController::class,'delete']);
    });

    Route::group(['prefix'=>'orders'],function(){
        Route::get("/",[OrderController::class, 'index']);
        Route::post('/update/{id}',[OrderController::class,'update']);
        Route::get('/view/{id}',[OrderController::class,'detail']);
    });
});
