<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\orederController;
use App\Http\Controllers\loginController;

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

// Route::get('/',[loginController::class, 'login'])->name('login');
// Route::post('/login',[loginController::class, 'loginSubmit'])->name('login.submit');

// Route::get('/logout',[loginController::class, 'logout'])->middleware('AdminAccess')->name('logout');


// Route::get('/Adminhome',[homeController::class, 'home'])->middleware('AdminAccess')->name('admin.home');

// ///...........Customer........
// Route::get('/customer',[customerController::class, 'index'])->middleware('AdminAccess')->name('customer.index');
// Route::get('/customer/create',[customerController::class, 'create'])->middleware('AdminAccess')->name('customer.create');
// Route::post('/customer/save',[customerController::class, 'save'])->middleware('AdminAccess')->name('customer.save');
// Route::post('/customer/edit',[customerController::class, 'editSubmit']);
// Route::get('/customer/edit/{id}',[customerController::class, 'edit']);
// Route::get('/customer/delete/{id}',[customerController::class, 'delete']);
// Route::post('/customer/search',[customerController::class, 'search'])->middleware('AdminAccess')->name('customer.search');
// Route::get('/customer/history/{id}',[customerController::class, 'history'])->middleware('AdminAccess');
// Route::get('/customer/block/{id}',[customerController::class, 'block'])->middleware('AdminAccess');




// //.........Category.......
// Route::get('/category/index',[categoryController::class,'index'])->middleware('AdminAccess')->name('category.index');
// Route::get('/category/create',[categoryController::class,'create'])->middleware('AdminAccess')->name('category.create');
// Route::post('/category/save',[categoryController::class,'save'])->middleware('AdminAccess')->name('category.save');
// Route::get('/category/delete/{id}',[categoryController::class,'delete'])->middleware('AdminAccess')->middleware('AdminAccess')->name('category.delete');
// Route::get('/category/edit/{id}',[categoryController::class,'edit'])->middleware('AdminAccess')->name('category.edit');
// Route::post('/category/edit',[categoryController::class,'editsubmit'])->middleware('AdminAccess')->name('category.editsubmit');


// ///...........Product.........
// Route::get('/product',[productController::class,'index'])->middleware('AdminAccess')->name('product.index');
// Route::get('/product/create',[productController::class,'create'])->middleware('AdminAccess')->name('product.create');
// Route::post('/product/save',[productController::class,'save'])->middleware('AdminAccess')->name('product.save');
// Route::get('/product/order/{id}',[productController::class,'details'])->middleware('AdminAccess')->name('product.details');
// Route::post('/product/search',[productController::class,'search'])->middleware('AdminAccess')->name('product.search');




// ////......Manager..........
// Route::get('/manager',[managerController::class,'index'])->middleware('AdminAccess')->name('manager.index');
// Route::get('/manager/create',[managerController::class,'create'])->middleware('AdminAccess')->name('manager.create');
// Route::post('/manager/save',[managerController::class,'save'])->middleware('AdminAccess')->name('manager.save');
// Route::get('/manager/delete/{id}',[managerController::class,'delete'])->middleware('AdminAccess')->name('manager.delete');
// Route::get('/manager/editg/{id}',[managerController::class,'edit'])->middleware('AdminAccess')->name('manager.edit');
// Route::post('/manager/edit',[managerController::class,'editsubmit'])->middleware('AdminAccess')->name('manager.editsubmit');



// ////.........DeliveryMan......
// Route::get('/deliveryMan',[managerController::class,'index'])->middleware('AdminAccess')->name('deliveryMan.index');



// ////.......Orders.......
// Route::get('/order',[orederController::class,'index'])->middleware('AdminAccess')->name('order.index');
// Route::get('/order/details/{id}',[orederController::class,'details'])->middleware('AdminAccess')->name('order.details');
// Route::get('/order/cancell/{id}',[orederController::class,'cancell'])->middleware('AdminAccess')->name('order.cancell');
// Route::post('/order/search',[orederController::class,'search'])->middleware('AdminAccess')->name('order.search');