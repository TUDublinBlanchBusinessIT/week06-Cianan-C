<?php

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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('products', App\Http\Controllers\ProductController::class);


Route::resource('scorders', App\Http\Controllers\ScorderController::class);


Route::resource('orderdetails', App\Http\Controllers\OrderdetailController::class);


Route::get('product/displaygrid', 'App\Http\Controllers\ProductController@displayGrid')->name('products.displaygrid');