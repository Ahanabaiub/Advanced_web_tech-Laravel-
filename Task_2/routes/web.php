<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;

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
    return view('homLog');
});

Route::get('/home', function () {
    return view('home');
});


// Route::get('/login', function () {
//     return view('/pages/user/login');
// });

// Route::get('/registration', function () {
//     return view('/pages/user/registration');
// });

Route::get('/login',[userController::class,'login']);
Route::get('/registration',[userController::class,'registration']);
Route::post('/register',[userController::class,'register']);


Route::get('/product/service',[productController::class,'allProduct'])->name('service');
Route::get('/terms',[productController::class,'ourTerms']);
Route::get('/contact',[productController::class,'contactUsI']);
Route::get('/about',[productController::class,'aboutUs']);

Route::get('/product/create',[productController::class,'create'])->name('product.create');

Route::post('/product/create',[productController::class,'createSubmit'])->name('product.create');
Route::get('/product/list',[productController::class,'list'])->name('product.list');
Route::get('/product/edit/{id}',[productController::class,'edit']);
