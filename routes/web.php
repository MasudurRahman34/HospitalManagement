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
Route::get('/index', function () {
    return view('backend.pages.index');
});
// Route::group(['middleware' => ['auth', 'role_or_permission:Student'], 'prefix'=>'mystudent', 'namespace'=>'backend'], function () {

// });
Route::group([ 'prefix'=>'supplier', 'namespace'=>'Supplier'], function () {
    Route::get('/list', 'SupplierController@index')->name('supplier.list');
    Route::post('/store', 'SupplierController@store')->name('supplier.store');
    Route::post('/update/{supplier}', 'SupplierController@update')->name('supplier.update');
    Route::get('/synctable', 'SupplierController@syncTable')->name('supplier.synctable');
    Route::get('/edit/{supplier}', 'SupplierController@edit')->name('supplier.edit');
    Route::get('/destroy/{supplier}', 'SupplierController@destroy')->name('supplier.destroy');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Route::group([ 'prefix'=>'product', 'namespace'=>'Product'], function () {
    Route::get('/list', 'ProductController@index')->name('product.list');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Route::group([ 'prefix'=>'unit', 'namespace'=>'Unit'], function () {
    Route::get('/list', 'UnitController@index')->name('unit.list');
    Route::post('/store', 'UnitController@store')->name('unit.store');
    Route::post('/update/{unit}', 'UnitController@update')->name('unit.update');
    //Route::get('/synctable', 'UnitController@syncTable')->name('unit.synctable');
    Route::get('/edit/{unit}', 'UnitController@edit')->name('unit.edit');
    Route::get('/destroy/{unit}', 'UnitController@destroy')->name('unit.destroy');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});
Route::group([ 'prefix'=>'catagory', 'namespace'=>'Catagory'], function () {
    Route::get('/list', 'CatagoryController@index')->name('catagory.list');
    Route::post('/store', 'CatagoryController@store')->name('catagory.store');
    Route::post('/update/{catagory}', 'CatagoryController@update')->name('catagory.update');
    Route::get('/synctable', 'CatagoryController@syncTable')->name('catagory.synctable');
    Route::get('/edit/{catagory}', 'CatagoryController@edit')->name('catagory.edit');
    Route::get('/destroy/{catagory}', 'CatagoryController@destroy')->name('catagory.destroy');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//pos
Route::group([ 'prefix'=>'pos', 'namespace'=>'Pos'], function () {
    Route::get('/purchase/rq', 'PosController@purchaseRq')->name('purchase.rq');
         //Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});
