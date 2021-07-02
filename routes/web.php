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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'danh-muc'], function() {
    Route::get('/danh-sach','backEnd\CategoryController@list')->name('category.list');
    Route::get('/trang-tao-danh-muc','backEnd\CategoryController@add')->name('category.add');
    Route::post('/tao-danh-muc','backEnd\CategoryController@save')->name('category.save');
    Route::get('/trang-sua-danh-muc/{id}','backEnd\CategoryController@edit')->name('category.edit');
    Route::post('/sua-danh-muc/{id}','backEnd\CategoryController@update')->name('category.update');
    Route::post('/xoa-danh-muc','backEnd\CategoryController@delete')->name('category.delete');
    Route::post('/sua-trang-thai','backEnd\CategoryController@status')->name('category.status');
});

Route::group(['prefix' => 'san-pham'], function() {
    Route::get('/danh-sach','backEnd\ProductController@list')->name('product.list');
    Route::get('/trang-tao-san-pham','backEnd\ProductController@add')->name('product.add');
});

//Client
Route::get('/', 'Client\HomeController@index')->name('list-main');
