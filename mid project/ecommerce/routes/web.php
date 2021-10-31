<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\orederController;

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

Route::get('/',[homeController::class, 'home']);

///...........Customer........
Route::get('/customer',[customerController::class, 'index'])->name('customer.index');
Route::get('/customer/create',[customerController::class, 'create'])->name('customer.create');
Route::post('/customer/save',[customerController::class, 'save'])->name('customer.save');
Route::post('/customer/edit',[customerController::class, 'editSubmit']);
Route::get('/customer/edit/{id}',[customerController::class, 'edit']);
Route::get('/customer/delete/{id}',[customerController::class, 'delete']);


//.........Category.......
Route::get('/category/index',[categoryController::class,'index'])->name('category.index');
Route::get('/category/create',[categoryController::class,'create'])->name('category.create');
Route::post('/category/save',[categoryController::class,'save'])->name('category.save');
Route::get('/category/delete/{id}',[categoryController::class,'delete'])->name('category.delete');
Route::get('/category/edit/{id}',[categoryController::class,'edit'])->name('category.edit');
Route::post('/category/edit',[categoryController::class,'editsubmit'])->name('category.editsubmit');


///...........Product.........
Route::get('/product',[productController::class,'index'])->name('product.index');
Route::get('/product/create',[productController::class,'create'])->name('product.create');
Route::post('/product/save',[productController::class,'save'])->name('product.save');
Route::get('/product/order/{id}',[productController::class,'details'])->name('product.details');


////......Manager..........
Route::get('/manager',[managerController::class,'index'])->name('manager.index');
Route::get('/manager/create',[managerController::class,'create'])->name('manager.create');
Route::post('/manager/save',[managerController::class,'save'])->name('manager.save');
Route::get('/manager/delete/{id}',[managerController::class,'delete'])->name('manager.delete');
Route::get('/manager/editg/{id}',[managerController::class,'edit'])->name('manager.edit');
Route::post('/manager/edit',[managerController::class,'editsubmit'])->name('manager.editsubmit');



////.........DeliveryMan......
Route::get('/deliveryMan',[managerController::class,'index'])->name('deliveryMan.index');



////.......Orders.......
Route::get('/order',[orederController::class,'index'])->name('order.index');
Route::get('/order/details/{id}',[orederController::class,'details'])->name('order.details');