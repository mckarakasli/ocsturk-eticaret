<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backend\adminController;
use App\Http\Controllers\backend\brandsController;
use App\Http\Controllers\backend\categoriesController;
use App\Http\Controllers\backend\orderControllers;
use App\Http\Controllers\backend\productsController;
use App\Http\Controllers\backend\standController;
use App\Http\Controllers\frontend\homeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',[homeController::class,'index'])->name('homePanel');
Route::get('standlarimiz',[homeController::class,'standlarimiz'])->name('standlarimiz');
Route::get('standlarimiz/{id}',[homeController::class,'standDetail'])->name('standDetail');

Route::Get('urunlerimiz',[homeController::class,'urunlerimiz'])->name('urunlerimiz');
Route::get('giris-yap',[homeController::class,'login'])->name('login');
Route::get('iletisim',[homeController::class,'iletisim'])->name('iletisim');
Route::get('hakkimizda',[homeController::class,'hakkimizda'])->name('hakkimizda');

Route::middleware(['isLogin'])->group(function () {

Route::post('/cart/{id}',[homeController::class,'addtocart'])->name('addtocart');
Route::get('/cart',[homeController::class,'cart'])->name('cart');
Route::get('payments',[homeController::class,'payment_page'])->name('payment');
Route::post('order',[homeController::class,'order'])->name('order');
    Route::get('siparis-alinmistir/{orderno}',[homeController::class,'complated'])->name('complated');

    
});


Route::prefix('admin')->middleware('isAdmin')->group(function(){
     Route::get('/', [adminController::class,'index'])->name('admin.panel');
     Route::resource('brands',brandsController::class);
     Route::get('brand/getData', [brandsController::class,'getData'])->name('brands.getdata');
     Route::post('brand/update',[brandsController::class,'update'])->name('brands.update');
     Route::get('brand/{id}/delete',[brandsController::class,'destroy'])->name('brands.destroy');

     Route::resource('categories',categoriesController::class);
      Route::get('categories/getData', [categoriesController::class,'getData'])->name('categories.getdata');
     Route::post('categories/update',[categoriesController::class,'update'])->name('categories.update');
     Route::get('categories/{id}/delete',[categoriesController::class,'destroy'])->name('categories.destroy');

     Route::resource('products',productsController::class);
     Route::get('products/{id}/delete',[productsController::class,'destroy'])->name('products.destroy');

     Route::resource('orders',orderControllers::class);
     Route::get('orderDetail',[orderControllers::class,'getdata'])->name('orderDetail.getdata');
     Route::resource('standlar',standController::class);
     Route::get('orderFilter',[orderControllers::class,'orderFilter'])->name('order.filter');
 
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

