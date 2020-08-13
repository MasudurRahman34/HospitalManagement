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
