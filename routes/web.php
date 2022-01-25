<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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

Route::get('/', function () {
    return redirect('/product');
});


Route::get('/login-admin', function () {
    return view('admin.login');
});

Route::resource('category', CategoryController::class);
Route::get('/product', [ProductController::class, 'index']); //untuk user
Route::get('/productlist', [ProductController::class, 'listForInternal'])->name('product.index'); ; //untuk tim internal
Route::post('/productlist', [ProductController::class, 'store'])->name('product.store'); 
Route::get('/product-input', [ProductController::class, 'create'])->name('product.input'); 