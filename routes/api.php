<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'prefix'=>'unit', 'namespace'=>'Unit'], function () {
    Route::get('/synctable', 'UnitController@syncTable')->name('unit.synctable');
});

Route::group([ 'prefix'=>'contactperson', 'namespace'=>'Contact'], function () {
   // Route::get('/list', 'ContactPersonController@index')->name('contactperson.list');
    Route::post('/store', 'ContactPersonController@store')->name('contactperson.store');
    Route::PUT('/update/{contactperson}', 'ContactPersonController@update')->name('contactperson.update');
    //Route::get('/synctable', 'ContactPersonController@syncTable')->name('contactperson.synctable');
    Route::get('/edit/{contactperson}', 'ContactPersonController@edit')->name('contactperson.edit');
    Route::get('/destroy/{contactperson}', 'ContactPersonController@destroy')->name('contactperson.destroy');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Route::group([ 'prefix'=>'product', 'namespace'=>'Product'], function () {
    Route::Post('/search/name', 'ProductController@searchProductName')->name('product.searchProductName');
    Route::get('/search/supplier_id/{supplier_id}', 'ProductController@filterSupplierProduct')->name('product.filterSupplierProduct');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::post('/update/{product}', 'ProductController@update')->name('product.update');
    Route::get('/synctable', 'ProductController@syncTable')->name('product.synctable');
    Route::get('/edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::get('/destroy/{product}', 'ProductController@destroy')->name('product.destroy');
    
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Route::group([ 'prefix'=>'order', 'namespace'=>'Order'], function () {
    Route::post('/store', 'OrderController@store')->name('order.store');
    Route::post('/update/{order}', 'OrderController@update')->name('order.update');
    Route::put('/approved/{order}', 'OrderController@orderApproved')->name('order.approved');
    Route::get('/synctable', 'OrderController@syncTable')->name('order.synctable');
    Route::get('product/synctable', 'OrderController@orderDetaisSynctable')->name('product_stock.synctable');
    Route::post('/stock/quantity/{order}', 'OrderController@stockQuantity')->name('product_stock.quantity');
    Route::get('/edit/{order}', 'OrderController@edit')->name('order.edit');
    Route::get('/destroy/{order}', 'OrderController@destroy')->name('order.destroy');
    
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});
Route::group([ 'prefix'=>'account', 'namespace'=>'Account'], function () {
    Route::post('/store', 'AccountController@store')->name('account.store');
    Route::post('/update/{account}', 'AccountController@update')->name('account.update');
    Route::get('/synctable', 'AccountController@syncTable')->name('account.synctable');
    Route::get('/edit/{account}', 'AccountController@edit')->name('account.edit');
    Route::get('/destroy/{account}', 'AccountController@destroy')->name('account.destroy');
    
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});