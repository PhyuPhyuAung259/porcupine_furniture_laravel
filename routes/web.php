<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Porcupine\CartController;
 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('porcupine.index');
});

Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect')->middleware('auth','verified');

//admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/order_list',[AdminController::class,'order_list'])->name('order_list');
Route::get('/orderdetail_list/{id}',[AdminController::class,'orderdetail_list'])->name('orderdetail_list');
Route::get('/order_confirm/{id}',[AdminController::class,'order_confirm'])->name('order_confirm');
Route::get('/send_email/{id}', [AdminController::class, 'send_email'])->name('send_email');
Route::post('/send_user_email/{id}', [AdminController::class, 'send_user_email'])->name('send_user_email');

Route::resource('/categoryprocess',CategoryController::class);
Route::resource('/productprocess',ProductController::class);
//admin

//user
Route::get('/product', function () {
    return view('porcupine.product');
});
Route::get('/show_product',[HomeController::class,'show_product'])->name('show_product');
Route::get('/show_product/{category_id}',[HomeController::class,'show_product_with_category'])->name('show_product_with_category');
Route::get('/product_detail/{product_id}',[HomeController::class,'product_detail'])->name('product_detail');
//user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/show_cart',[CartController::class,'show_cart'])->name('show_cart');
    Route::post('/addtocart/{id}',[CartController::class,'add_to_cart'])->name('addtocart');
    Route::get('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('delete_cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/confirm_checkout', [CartController::class, 'confirm_checkout'])->name('confirm_checkout');
    

});

 

 

 
require __DIR__.'/auth.php';
