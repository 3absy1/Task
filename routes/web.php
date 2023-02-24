<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Models\Products;
use App\Models\Sales;
use App\Models\User;
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

//***************************************   Users   ************************************************************

Route::get('Users', function () {
    return view('users.users',[
        'users' => User::all()
    ]);
});
//--------edit--------
Route::get('{usersID}/edit2',[UserController::class ,'show']);
Route::put('{usersID}/update2', [UserController::class,'update']);
//--------delete--------
Route::get('{usersID}/delete2', [UserController::class,'destroy']);
//--------create--------
Route::get('create2',[UserController::class ,'index']);
Route::get('add2', [UserController::class,'create']);


//***************************************   Products   ************************************************************


Route::get('Products', function () {
    return view('products.products',[
        'products' => Products::all()
    ]);
});
//--------edit--------
Route::get('{productsID}/edit1',[ProductsController::class ,'show']);
Route::put('{productsID}/update1', [ProductsController::class,'update']);
//--------delete--------
Route::get('{productsID}/delete1',[ProductsController::class ,'destroy']);
//--------create--------
Route::get('create1',[ProductsController::class ,'index']);
Route::get('add1',[ProductsController::class ,'create']);



//***************************************   Sales    ************************************************************


Route::get('Sales', function () {
    return view('sales.sales',[
        'sales' => Sales::all()
    ]);
});
//--------edit--------
Route::get('{salesID}/edit3',[SalesController::class ,'show']);
Route::put('{salesID}/update3', [SalesController::class,'update']);
//--------delete--------
Route::get('{salesID}/delete3',[SalesController::class ,'destroy']);
//--------create--------
Route::get('create3',[SalesController::class ,'index']);
Route::get('{id}/add3',[SalesController::class ,'create']);

