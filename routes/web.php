<?php

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
Route::get('test', function () {
    return view('layouts.app_master_admin');
});
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'trademark'], function () {
        Route::get('', 'Admin\TrademarkController@index')->name('admin.trademark.index');
        Route::get('create', 'Admin\TrademarkController@create')->name('admin.trademark.create');
        Route::post('createe', 'Admin\TrademarkController@store');
        Route::get('update/{id}', 'Admin\TrademarkController@edit')->name('admin.trademark.update');
        Route::post('update/{id}', 'Admin\TrademarkController@update');
        Route::get('active/{id}', 'Admin\TrademarkController@active')->name('admin.trademark.active');
        Route::get('hot/{id}', 'Admin\TrademarkController@hot')->name('admin.trademark.hot');
        Route::get('delete/{id}', 'Admin\TrademarkController@delete')->name('admin.trademark.delete');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::get('', 'Admin\CategoryController@index')->name('admin.category.index');
        Route::get('create', 'Admin\CategoryController@create')->name('admin.category.create');
        Route::post('createe', 'Admin\CategoryController@store');
        Route::get('update/{id}', 'Admin\CategoryController@edit')->name('admin.category.update');
        Route::post('update/{id}', 'Admin\CategoryController@update');
        Route::get('active/{id}', 'Admin\CategoryController@active')->name('admin.category.active');
        Route::get('hot/{id}', 'Admin\CategoryController@hot')->name('admin.category.hot');
        Route::get('delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'Admin\ProductController@index')->name('admin.product.index');
        Route::get('create', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('create', 'Admin\ProductController@store');
        Route::get('update/{id}', 'Admin\ProductController@edit')->name('admin.product.update');
        Route::post('update/{id}', 'Admin\ProductController@update');
        Route::get('active/{id}', 'Admin\ProductController@active')->name('admin.product.active');
        Route::get('hot/{id}', 'Admin\ProductController@hot')->name('admin.product.hot');
        Route::get('delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
        Route::post('ajax_product', 'Admin\ProductController@ajax_product')->name('admin.ajax_product');

    });
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('', 'Admin\CouponController@index')->name('admin.coupon.index');
        Route::get('create', 'Admin\CouponController@create')->name('admin.coupon.create');
        Route::post('create', 'Admin\CouponController@store');
        Route::get('update/{id}', 'Admin\CouponController@edit')->name('admin.coupon.update');
        Route::post('update/{id}', 'Admin\CouponController@update');
        Route::get('active/{id}', 'Admin\CouponController@active')->name('admin.coupon.active');
        Route::get('delete/{id}', 'Admin\CouponController@delete')->name('admin.coupon.delete');
    });
});
Route::group(['prefix' => 'pages'], function () {
    Route::group(['prefix' => 'home'], function () {
        Route::get('', 'Frontend\HomeController@index')->name('pages.home.index');
        Route::get('product-detail/{slug}', 'Frontend\HomeController@detail')->name('pages.home.detail');
        Route::post('auto-complete', 'Frontend\HomeController@autoComplete')->name('page.home.autoComplete');
        Route::post('search', 'Frontend\HomeController@search')->name('page.home.search');
    });
    Route::get('order', 'Frontend\ShoppingCartController@index')->name('frontend.shopping.index');
    Route::group(['prefix' => 'shopping'], function () {
        Route::get('add/{id}', 'Frontend\ShoppingCartController@add')->name('frontend.shopping.add');
        Route::post('delete', 'Frontend\ShoppingCartController@delete')->name('frontend.shopping.delete');
        Route::post('update', 'Frontend\ShoppingCartController@update')->name('frontend.shopping.update');
        Route::post('pay', 'Frontend\ShoppingCartController@postpay');
        Route::post('ajax_coupon', 'Admin\ProductController@ajax_coupon')->name('admin.ajax_coupon');
        Route::post('delete_ajax_coupon', 'Admin\ProductController@delete_ajax_coupon')->name('admin.delete.ajax_coupon');
        Route::post('ajax_location', 'Frontend\ShoppingCartController@ajax_location')->name('ajax_get.location');
    });
});
