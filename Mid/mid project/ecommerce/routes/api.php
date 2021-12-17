<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\productController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\orederController;
use App\Http\Controllers\apiLoginController;
use App\Http\Controllers\deliveryManController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//Route::get('/',[loginController::class, 'login'])->name('login');
Route::post('/login',[apiLoginController::class, 'login']);

Route::get('/uname/{id}',[apiLoginController::class, 'getuname'])->middleware('ApiAuth');


Route::get('/logout',[apiloginController::class, 'logout'])->middleware('ApiAuth');


Route::get('/Adminhome',[homeController::class, 'home'])->middleware('AdminAccess')->name('admin.home');

///...........Customer........
Route::get('/customer/all',[customerController::class, 'index'])->middleware('ApiAuth');
Route::get('/customer/allCount',[customerController::class, 'count'])->middleware('ApiAuth');
Route::get('/customer/create',[customerController::class, 'create'])->middleware('ApiAuth');
Route::post('/customer/save',[customerController::class, 'save'])->middleware('ApiAuth');
Route::post('/customer/edit',[customerController::class, 'editSubmit'])->middleware('ApiAuth');
Route::get('/customer/edit/{id}',[customerController::class, 'edit'])->middleware('ApiAuth');
Route::get('/customer/delete/{id}',[customerController::class, 'delete'])->middleware('ApiAuth');
Route::post('/customer/search',[customerController::class, 'search'])->middleware('ApiAuth');
Route::get('/customer/history/{id}',[customerController::class, 'history'])->middleware('ApiAuth');
Route::get('/customer/block/{id}',[customerController::class, 'block'])->middleware('ApiAuth');




//.........Category.......
Route::get('/category/all',[categoryController::class,'index'])->middleware('ApiAuth');
Route::get('/category/allCount',[categoryController::class,'count'])->middleware('ApiAuth');
Route::get('/category/create',[categoryController::class,'create'])->middleware('ApiAuth');
Route::post('/category/save',[categoryController::class,'save'])->middleware('ApiAuth');
Route::get('/category/delete/{id}',[categoryController::class,'delete'])->middleware('ApiAuth');
Route::get('/category/edit/{id}',[categoryController::class,'edit'])->middleware('ApiAuth');
Route::post('/category/edit',[categoryController::class,'editsubmit'])->middleware('ApiAuth');


///...........Product.........
Route::get('/product/all',[productController::class,'getAll'])->middleware('ApiAuth');
Route::get('/product/countAll',[productController::class,'allCount'])->middleware('ApiAuth');
Route::get('/product/get/{id}',[productController::class,'get'])->middleware('ApiAuth');
Route::get('/product/create',[productController::class,'create'])->middleware('ApiAuth');
Route::post('/product/save',[productController::class,'save'])->middleware('ApiAuth');
Route::get('/product/order/{id}',[productController::class,'details'])->middleware('ApiAuth');
Route::get('/product/top-sold',[productController::class,'topSold'])->middleware('ApiAuth');
Route::get('/product/search',[productController::class,'search'])->middleware('ApiAuth');
Route::delete('/product/delete/{id}',[productController::class,'delete'])->middleware('ApiAuth');

Route::post('/product/test',[productController::class,'test']);




////......Manager..........
Route::get('/manager/all',[managerController::class,'getAll']);
Route::get('/manager/allCount',[managerController::class,'getAllCount']);
Route::get('/manager/create',[managerController::class,'create'])->middleware('AdminAccess')->name('manager.create');
Route::post('/manager/save',[managerController::class,'save'])->middleware('AdminAccess')->name('manager.save');
Route::get('/manager/delete/{id}',[managerController::class,'delete'])->middleware('AdminAccess')->name('manager.delete');
Route::get('/manager/editg/{id}',[managerController::class,'edit'])->middleware('AdminAccess')->name('manager.edit');
Route::post('/manager/edit',[managerController::class,'editsubmit'])->middleware('AdminAccess')->name('manager.editsubmit');



////.........DeliveryMan......
Route::get('/deliveryMan/all',[deliveryManController::class,'index']);

Route::get('/deliveryMan/allCount',[deliveryManController::class,'count']);



////.......Orders.......
Route::get('/order/all',[orederController::class,'index']);
Route::get('/order/allCount',[orederController::class,'count']);
Route::get('/order/details/{id}',[orederController::class,'details'])->middleware('AdminAccess')->name('order.details');
Route::get('/order/cancell/{id}',[orederController::class,'cancell'])->middleware('AdminAccess')->name('order.cancell');
Route::post('/order/search',[orederController::class,'search'])->middleware('AdminAccess')->name('order.search');
Route::get('/order/get-monthly-data',[orederController::class,'getMonthlyData']);
Route::get('/order/get-category-data',[orederController::class,'orderChat']);



///.....Reports.......
Route::get('/report/get-mn-selles',[orederController::class,'getMonthlySellData'])->middleware('ApiAuth');
Route::get('/report/get-yy-selles',[orederController::class,'getYearlySellData'])->middleware('ApiAuth');



