<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backEnd\AdminController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backEnd\ProductController;
use App\Http\Controllers\backend\ProductVariationTypeController;
use App\Http\Controllers\backend\ProductVariationController;
use App\Http\Controllers\backEnd\UserController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\SlideContrller;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\TypeProductController;


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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'AuthController@getLogin')->name('get.login');
    Route::post('/login', 'AuthController@postLogin')->name('post.login');
    Route::get('/logout', 'AuthController@logout')->name('get.logout');
});


// Route::group(['middleware' => 'checkLogin', 'prefix' => 'quan-tri'], function (){
//     Route::get('/', 'backEnd\AdminController@getHome')->name('get.home');
//     // Quản lý danh mục
//     Route::group(['prefix' => 'danh-muc'], function() {
//         Route::get('/','backEnd\CategoryController@index')->name('category.index');
//         Route::get('/tao-moi','backEnd\CategoryController@create')->name('category.create');
//         Route::post('/tao-moi','backEnd\CategoryController@store')->name('category.store');
//         Route::get('/sua/{id}','backEnd\CategoryController@edit')->name('category.edit');
//         Route::post('/sua/{id}','backEnd\CategoryController@update')->name('category.update');
//         Route::post('/xoa','backEnd\CategoryController@delete')->name('category.delete');
//         Route::post('/sua-trang-thai','backEnd\CategoryController@status')->name('category.status');
//     });
//       // Quản lý nhà cung cấp
//         Route::group(['prefix' => 'nha-cung-cap'], function() {
//         Route::get('/','backEnd\UnitController@index')->name('unit.index');
//         Route::get('/tao-moi','backEnd\UnitController@create')->name('unit.create');
//         Route::post('/tao-moi','backEnd\UnitController@store')->name('unit.store');
//         Route::get('/sua/{id}','backEnd\UnitController@edit')->name('unit.edit');
//         Route::post('/sua/{id}','backEnd\UnitController@update')->name('unit.update');
//         Route::post('/xoa','backEnd\UnitController@delete')->name('unit.delete');
//         Route::post('/sua-trang-thai','backEnd\UnitController@status')->name('unit.status');
//     });
//     //Quản lý loại sản phẩm
//     Route::group(['prefix' => 'loai-san-pham'], function() {
//         Route::get('/','backEnd\TypeProductController@index')->name('type_product.index');
//         Route::get('/tao-moi','backEnd\TypeProductController@create')->name('type_product.create');
//         Route::get('/tao-moi-san-pham','backEnd\TypeProductController@product_create')->name('product_create');
//         Route::post('/tao-moi-type','backEnd\TypeProductController@store')->name('type_product.store');
//         Route::get('/sua/{id}','backEnd\TypeProductController@edit')->name('type_product.edit');
//         Route::post('/sua/{id}','backEnd\TypeProductController@update')->name('type_product.update');
//         Route::post('/xoa','backEnd\TypeProductController@delete')->name('type_product.delete');
//         Route::post('/sua-trang-thai','backEnd\TypeProductController@status')->name('type_product.status');
//     });
//     //Quản lý sản phẩm
//     Route::group(['prefix' => 'san-pham'], function() {
//         Route::get('/{status}','backEnd\ProductController@index')->name('product.index');
//         Route::post('/tao-moi','backEnd\ProductController@store')->name('product.store');
//         Route::get('/trang-sua/{id}', 'backEnd\ProductController@edit')->name('product.edit');
//         Route::post('/sua/{id}', 'backEnd\ProductController@update')->name('product.update');
//         Route::post('/xoa', 'backEnd\ProductController@delete')->name('product.delete');
//         Route::post('/sua-trang-thai', 'backEnd\ProductController@status')->name('product.status');
//     });
//     // Quản lý kho hàng
//     Route::group(['prefix' => 'quan-ly-kho-hang'], function () {
//         Route::get('/','backEnd\InventoryController@index')->name('inventory.index');
//         Route::get('/tao-moi','backEnd\InventoryController@create')->name('inventory.create');
//         Route::post('/tao-moi','backEnd\InventoryController@store')->name('inventory.store');
//         Route::get('/sua/{id}','backEnd\InventoryController@edit')->name('inventory.edit');
//         Route::post('/sua/{id}','backEnd\InventoryController@update')->name('inventory.update');
//         Route::post('/xoa','backEnd\InventoryController@destroy')->name('inventory.destroy');
//         Route::post('/sua-trang-thai','backEnd\InventoryController@status')->name('inventory.status');
//     });
//     //Quản lý contact
//     Route::group(['namespace' => 'backEnd','prefix' => 'manage-contact'], function () {
//         Route::get('/','ContactController@index')->name('contact.index');
//         Route::get('un-active/{id}', 'ContactController@Unactive_contact')->name('un-active');
//         Route::get('active/{id}', 'ContactController@Active_contact')->name('active');
//     });
//        //Quản lý introduce
//        Route::group(['prefix' => 'quan-ly-gioi-thieu'], function () {
//         Route::get('/','backEnd\IntroductsController@index')->name('introduct.index');
//         Route::get('/tao-moi','backEnd\IntroductsController@create')->name('introduct.create');
//         Route::post('/tao-moi','backEnd\IntroductsController@store')->name('introduct.store');
//         Route::get('/sua/{id}','backEnd\IntroductsController@edit')->name('introduct.edit');
//         Route::post('/sua/{id}','backEnd\IntroductsController@update')->name('introduct.update');
//         Route::post('/xoa','backEnd\IntroductsController@destroy')->name('introduct.delete');
//         Route::post('/sua-trang-thai','backEnd\IntroductsController@status')->name('introduct.status');
//     });
// });


Route::group(['middleware' => 'checkLogin', 'prefix' => 'admin'], function () {
    /**
     * Router home administrator
     */
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**
     * Route group quản lý tài khoản
     */
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
    });

    /**
     * Route group quản lý sản phẩm
     */
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
        Route::post('/edit-status', [ProductController::class, 'status'])->name('status');

    });

    /**
     * Route group quản lý danh sách khách hàng
     */
    Route::group(['prefix' => 'customers', 'as' => 'customers.'], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::get('/create', [CustomerController::class, 'create'])->name('create');
        Route::post('/store', [CustomerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CustomerController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');
    });
    

    /**
     * Route group quản lý đặt hàng
     */
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [OrderController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [OrderController::class, 'destroy'])->name('destroy');
    });

    /**
     * Route group quản lý danh mục sản phẩm
     */
     Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
         Route::get('/', [CategoryController::class, 'index'])->name('index');
         Route::get('/create', [CategoryController::class, 'create'])->name('create');
         Route::post('/store', [CategoryController::class, 'store'])->name('store');
         Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
         Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
         Route::post('/xoa', [CategoryController::class, 'delete'])->name('delete');
         Route::post('/sua-trang-thai',[CategoryController::class, 'status'])->name('status');
        
     });
     Route::group(['prefix' => 'units', 'as' => 'units.'], function () {
        Route::get('/', [UnitController::class, 'index'])->name('index');
        Route::get('/create', [UnitController::class, 'create'])->name('create');
        Route::post('/store', [UnitController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UnitController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UnitController::class, 'update'])->name('update');
        Route::post('/xoa', [UnitController::class, 'delete'])->name('delete');
        Route::post('/sua-trang-thai',[UnitController::class, 'status'])->name('status');
       
    });
  
     /**
     * Route group quản lý slide
     */
    Route::group(['prefix' => 'slide', 'as' => 'slide.'], function () {
        Route::get('/', [SlideContrller::class, 'index'])->name('index');
        Route::get('/create', [SlideContrller::class, 'create'])->name('create');
        Route::post('/store', [SlideContrller::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SlideContrller::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SlideContrller::class, 'update'])->name('update');
        Route::post('/delete',[SlideContrller::class, 'delete'])->name('delete');
        Route::post('/edit-status', [SlideContrller::class, 'status'])->name('status');
    });
    Route::group(['prefix' => 'manage-contact', 'as' => 'manage-contact.'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('abc123/{id}', [ContactController::class, 'Unactive_contact'])->name('unactive');
        Route::get('active/{id}', [ContactController::class,  'Active_contact'])->name('active');
       
});
Route::group(['prefix' => 'type_product', 'as' => 'type_product.'], function () {   
    Route::get('/', [TypeProductController::class, 'index'])->name('index');
    Route::get('/create', [TypeProductController::class, 'create'])->name('create');
    Route::post('/store', [TypeProductController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TypeProductController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [TypeProductController::class, 'update'])->name('update');
    Route::post('/xoa', [TypeProductController::class, 'delete'])->name('delete');
    Route::post('/sua-trang-thai', [TypeProductController::class, 'status'])->name('status');

});
  //Quản lý loại sản phẩm
//     Route::group(['prefix' => 'loai-san-pham'], function() {
//         Route::get('/','backEnd\TypeProductController@index')->name('type_product.index');
//         Route::get('/tao-moi','backEnd\TypeProductController@create')->name('type_product.create');
//         Route::get('/tao-moi-san-pham','backEnd\TypeProductController@product_create')->name('product_create');
//         Route::post('/tao-moi-type','backEnd\TypeProductController@store')->name('type_product.store');
//         Route::get('/sua/{id}','backEnd\TypeProductController@edit')->name('type_product.edit');
//         Route::post('/sua/{id}','backEnd\TypeProductController@update')->name('type_product.update');
//         Route::post('/xoa','backEnd\TypeProductController@delete')->name('type_product.delete');
//         Route::post('/sua-trang-thai','backEnd\TypeProductController@status')->name('type_product.status');
//     });
  




    // Route::group(['prefix'=>'variation-type', 'as' => 'variation-type.'],function(){
    //     Route::get('/',[ProductVariationTypeController::class,'index'])->name('index');
    //     Route::get('/create',[ProductVariationTypeController::class,'create'])->name('create');
    //     Route::post('/store',[ProductVariationTypeController::class,'store'])->name('store');
    //     Route::get('/edit/{id}',[ProductVariationTypeController::class,'edit'])->name('edit');
    //     Route::post('/update/{id}',[ProductVariationTypeController::class,'update'])->name('update');
    //     Route::post('/destroy/{id}',[ProductVariationTypeController::class,'destroy'])->name('destroy');
    // });
    // Route::group(['prefix'=>'variation', 'as' => 'variation.'],function(){
    //     Route::get('/create/{id}',[ProductVariationController::class,'create'])->name('create');
    //     Route::post('/store',[ProductVariationController::class,'store'])->name('store');
    //     Route::post('/destroy/{id}',[ProductVariationController::class,'destroy'])->name('destroy');
    // });
});



//Client
Route::get('/', 'Client\HomeController@index')->name('home');
Route::get('gioi-thieu', 'Client\AboutController@index')->name('about');
Route::get('san-pham', 'Client\ProductController@index')->name('product');
Route::get('bo-suu-tap', 'Client\GalleryController@index')->name('gallery');
Route::get('contact', 'Client\ContactController@index')->name('contact');
Route::post('post-contact', 'Client\ContactController@post_contact')->name('post.contact');
Route::get('chi-tiet-san-pham/{id}', 'Client\ProductDetailController@index')->name('product.detail');
/**
 * Route tinh năng thanh toán phí giaop diện người dùng.
 */
Route::get('thanh-toan', 'Client\CheckoutController@index')->name('checkout');
Route::post('/thanh-toan', 'Client\CheckoutController@postCheckout')->name('post.checkout');

/**
 * Route tính năng giỏ hàng phía giao diện người dùng.
 */
Route::get('gio-hang', 'Client\CartController@index')->name('cart');
Route::get('them-san-pham/{id}', 'Client\CartController@addCart')->name('add.cart');
Route::get('them-mot-san-pham/{id}', 'Client\CartController@addOneCart')->name('add.one.cart');
Route::post('cap-nhat-san-pham', 'Client\CartController@updateCart')->name('update.cart');
Route::delete('xoa-san-pham', 'Client\CartController@removeCart')->name('remove.cart');
