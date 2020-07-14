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
    Route::get('/synctable', 'SupplierController@syncTable')->name('supplier.synctable');
         Route::get('/edit/1', 'SupplierController@edit')->name('supplier.edit');
         Route::get('/edit2/{id}', 'SupplierController@edit2')->name('supplier.edit2');
});
