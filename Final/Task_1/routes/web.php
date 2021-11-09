<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;

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



Route::get('/',[ProductController::class,'list'])->name('home');

//Product routes
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/create',[ProductController::class,'createSubmit'])->name('product.create');
Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/product/edit',[ProductController::class,'editSubmit'])->name('product.edit');
Route::get('/product/delete/{id}',[ProductController::class,'delete']);
Route::get('/product/cart/{id}',[ProductController::class,'addToCart']);
Route::get('/product/mycart',[ProductController::class,'viewMyCart']);
Route::get('/product/session',[ProductController::class,'viewSession']);

//login
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'validateLogin']);


//Order
Route::get('/placeOrder', [OrderController::class,'makeOrder']);