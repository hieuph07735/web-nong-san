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
    Route::post('/tao-san-pham','backEnd\ProductController@save')->name('product.save');

});

//Tài khoản
Route::group(['prefix' => 'tai-khoan'], function() {
    Route::get('/danh-sach/{status}','backEnd\UserController@list')->name('user.list');
    Route::get('/trang-tao-tai-khoan','backEnd\UserController@add')->name('user.add');
    Route::post('/tao-tai-khoan','backEnd\UserController@save')->name('user.save');
    Route::post('/xoa-tai-khoan','backEnd\UserController@delete')->name('user.delete');
    Route::get('/trang-sua-tai-khoan/{id}','backEnd\UserController@edit')->name('user.edit');
    Route::post('/sua-tai-khoan/{id}','backEnd\UserController@update')->name('user.update');
});

//Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('gioi-thieu', 'Client\AboutController@index')->name('about');
Route::get('san-pham', 'Client\ProductController@index')->name('product');
Route::get('bo-suu-tap', 'Client\GalleryController@index')->name('gallery');
Route::get('lien-he', 'Client\ContactController@index')->name('contact');
Route::get('gio-hang', 'Client\CartController@index')->name('cart');
Route::get('chi-tiet-san-pham', 'Client\ProductDetailController@index')->name('product.detail');




// hiếu