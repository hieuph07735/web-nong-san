<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\AdminController;
use App\Http\Controllers\backend\ProductVariationTypeController;

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
//Admin
Route::group(['prefix' => 'admin'], function (){
    Route::get('/login', 'AuthController@getLogin')->name('get.login');
    Route::post('/login', 'AuthController@postLogin')->name('post.login');
    Route::get('/logout', 'AuthController@logout')->name('get.logout');
});

Route::group(['middleware' => 'checkLogin', 'prefix' => 'quan-tri'], function (){
    Route::get('/', 'backEnd\AdminController@getHome')->name('get.home');
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
      // Quản lý nhà cung cấp
        Route::group(['prefix' => 'nha-cung-cap'], function() {
        Route::get('/','backEnd\UnitController@index')->name('unit.index');
        Route::get('/tao-moi','backEnd\UnitController@create')->name('unit.create');
        Route::post('/tao-moi','backEnd\UnitController@store')->name('unit.store');
        Route::get('/sua/{id}','backEnd\UnitController@edit')->name('unit.edit');
        Route::post('/sua/{id}','backEnd\UnitController@update')->name('unit.update');
        Route::post('/xoa','backEnd\UnitController@delete')->name('unit.delete');
        Route::post('/sua-trang-thai','backEnd\UnitController@status')->name('unit.status');
    });
    //Quản lý loại sản phẩm
    Route::group(['prefix' => 'loai-san-pham'], function() {
        Route::get('/','backEnd\TypeProductController@index')->name('type_product.index');
        Route::get('/tao-moi','backEnd\TypeProductController@create')->name('type_product.create');
        Route::get('/tao-moi-san-pham','backEnd\TypeProductController@product_create')->name('product_create');
        Route::post('/tao-moi-type','backEnd\TypeProductController@store')->name('type_product.store');
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

    // Quản lý kho hàng
    Route::group(['prefix' => 'quan-ly-kho-hang'], function () {
        Route::get('/','backEnd\InventoryController@index')->name('inventory.index');
        Route::get('/tao-moi','backEnd\InventoryController@create')->name('inventory.create');
        Route::post('/tao-moi','backEnd\InventoryController@store')->name('inventory.store');
        Route::get('/sua/{id}','backEnd\InventoryController@edit')->name('inventory.edit');
        Route::post('/sua/{id}','backEnd\InventoryController@update')->name('inventory.update');
        Route::post('/xoa','backEnd\InventoryController@destroy')->name('inventory.destroy');
        Route::post('/sua-trang-thai','backEnd\InventoryController@status')->name('inventory.status');
    });
    //Quản lý contact
    Route::group(['namespace' => 'backEnd','prefix' => 'manage-contact'], function () {
        Route::get('/','ContactController@index')->name('contact.index');
        Route::get('un-active/{id}', 'ContactController@Unactive_contact')->name('un-active');
        Route::get('active/{id}', 'ContactController@Active_contact')->name('active');
    });
       //Quản lý introduce
       Route::group(['prefix' => 'quan-ly-gioi-thieu'], function () {
        Route::get('/','backEnd\IntroductsController@index')->name('introduct.index');
        Route::get('/tao-moi','backEnd\IntroductsController@create')->name('introduct.create');
        Route::post('/tao-moi','backEnd\IntroductsController@store')->name('introduct.store');
        Route::get('/sua/{id}','backEnd\IntroductsController@edit')->name('introduct.edit');
        Route::post('/sua/{id}','backEnd\IntroductsController@update')->name('introduct.update');
        Route::post('/xoa','backEnd\IntroductsController@destroy')->name('introduct.delete');
        Route::post('/sua-trang-thai','backEnd\IntroductsController@status')->name('introduct.status');
    });
});


Route::group(['middleware' => 'checkLogin', 'prefix' => 'admin'], function (){
    Route::group(['prefix'=>'variation-type', 'as' => 'variation-type.'],function(){
        Route::get('/',[ProductVariationTypeController::class,'index'])->name('index');
        Route::get('/create',[ProductVariationTypeController::class,'create'])->name('create');
        Route::post('/store',[ProductVariationTypeController::class,'store'])->name('store');
        Route::get('/edit/{id}',[ProductVariationTypeController::class,'edit'])->name('edit');
        Route::post('/update/{id}',[ProductVariationTypeController::class,'update'])->name('update');
        Route::post('/destroy/{id}',[ProductVariationTypeController::class,'destroy'])->name('destroy');
    });
});



//Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('gioi-thieu', 'Client\AboutController@index')->name('about');
Route::get('san-pham', 'Client\ProductController@index')->name('product');
Route::get('bo-suu-tap', 'Client\GalleryController@index')->name('gallery');
Route::get('contact', 'Client\ContactController@index')->name('contact');
Route::post('post-contact', 'Client\ContactController@post_contact')->name('post.contact');
Route::get('gio-hang', 'Client\CartController@index')->name('cart');
Route::get('chi-tiet-san-pham', 'Client\ProductDetailController@index')->name('product.detail');
Route::get('thanh-toan', 'Client\CheckoutController@index')->name('checkout.detail');


