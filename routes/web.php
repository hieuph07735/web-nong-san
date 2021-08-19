<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\AdminController;

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
Route::get('/register', 'AuthController@register')->name('get.register');
Route::post('/register', 'AuthController@storeUser')->name('post.register');

//Admin
Route::group(['prefix' => 'quan-tri'], function (){
    Route::get('/dang-nhap', 'AuthController@getLogin')->name('get.login');
    Route::post('/dang-nhap', 'AuthController@postLogin')->name('post.login');
    Route::get('/dang-xuat', 'AuthController@logout')->name('get.logout');
});

Route::group(['middleware' => 'checkLogin', 'prefix' => 'quan-tri'], function (){
    Route::get('/', 'backEnd\AdminController@getHome')->name('get.home');
    // Quản lý tài khoản
    Route::group(['prefix' => 'tai-khoan'], function() {
        Route::get('/danh-sach/{status}','backEnd\UserController@index')->name('user.index');
        Route::get('/tao-moi','backEnd\UserController@create')->name('user.create');
        Route::post('/tao-moi','backEnd\UserController@store')->name('user.store');
        Route::get('/sua/{id}','backEnd\UserController@edit')->name('user.edit');
        Route::post('/sua/{id}','backEnd\UserController@update')->name('user.update');
        Route::post('/xoa','backEnd\UserController@delete')->name('user.delete');
    });
    // Quản lý danh mục
    Route::group(['prefix' => 'danh-muc'], function() {
        Route::get('/','backEnd\CategoryController@index')->name('category.index');
        Route::get('/tao-moi','backEnd\CategoryController@create')->name('category.create');
        Route::post('/tao-moi','backEnd\CategoryController@store')->name('category.store');
        Route::get('/sua/{id}','backEnd\CategoryController@edit')->name('category.edit');
        Route::post('/sua/{id}','backEnd\CategoryController@update')->name('category.update');
        Route::post('/xoa','backEnd\CategoryController@delete')->name('category.delete');
        Route::post('/sua-trang-thai','backEnd\CategoryController@status')->name('category.status');
    });
    //Quản lý loại sản phẩm
    Route::group(['prefix' => 'loai-san-pham'], function() {
        Route::get('/','backEnd\TypeProductController@index')->name('type_product.index');
        Route::get('/tao-moi','backEnd\TypeProductController@create')->name('type_product.create');
        Route::get('/tao-moi-san-pham','backEnd\TypeProductController@product_create')->name('product_create');
        Route::post('/tao-moi','backEnd\TypeProductController@store')->name('type_product.store');
        Route::get('/sua/{id}','backEnd\TypeProductController@edit')->name('type_product.edit');
        Route::post('/sua/{id}','backEnd\TypeProductController@update')->name('type_product.update');
        Route::post('/xoa','backEnd\TypeProductController@delete')->name('type_product.delete');
        Route::post('/sua-trang-thai','backEnd\TypeProductController@status')->name('type_product.status');
    });

    //Quản lý sản phẩm
    Route::group(['prefix' => 'san-pham'], function() {
        Route::get('/{status}','backEnd\ProductController@index')->name('product.index');
        Route::post('/tao-moi','backEnd\ProductController@store')->name('product.store');
        Route::get('/trang-sua/{id}', 'backEnd\ProductController@edit')->name('product.edit');
        Route::post('/sua/{id}', 'backEnd\ProductController@update')->name('product.update');
        Route::post('/xoa', 'backEnd\ProductController@delete')->name('product.delete');
        Route::post('/sua-trang-thai', 'backEnd\ProductController@status')->name('product.status');


    });

});

//Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('gioi-thieu', 'Client\AboutController@index')->name('about');
Route::get('san-pham', 'Client\ProductController@index')->name('product');
Route::get('bo-suu-tap', 'Client\GalleryController@index')->name('gallery');
Route::get('lien-he', 'Client\ContactController@index')->name('contact');
Route::get('gio-hang', 'Client\CartController@index')->name('cart');
Route::get('chi-tiet-san-pham', 'Client\ProductDetailController@index')->name('product.detail');


