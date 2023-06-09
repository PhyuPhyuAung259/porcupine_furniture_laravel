<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
 
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
Route::get('/redirect',[HomeController::class,'redirect'])->name('redirect');

//admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/view_category',[AdminController::class,'view_category'])->name('view');
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
});

 

 

 
require __DIR__.'/auth.php';
