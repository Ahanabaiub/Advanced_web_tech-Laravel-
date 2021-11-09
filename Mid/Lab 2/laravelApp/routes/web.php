<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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
    return view('home');
});

Route::get('/profile',function () {
    return view('myProfile');
});

Route::get('/product/service',[productController::class,'allProduct'])->name('products');
Route::get('/terms',[productController::class,'ourTerms']);
Route::get('/contact',[productController::class,'contactUsI']);
Route::get('/about',[productController::class,'aboutUs']);

