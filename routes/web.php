<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/products', 'ProductController@index')->name('index_products');
Route::get('/products/create', 'ProductController@create')->name('create_products');
Route::post('/products', 'ProductController@store')->name('store_products');
Route::get('/products/{product}', 'ProductController@detail')->name('detail_product');
Route::get('/products/{product}/edit', 'ProductController@edit')->name('edit_product');
Route::patch('/products/{product}', 'ProductController@update')->name('update_product');
Route::delete('/products/{product}', 'ProductController@destroy')->name('destroy_product');

Route::get('/stocks', 'StockController@index')->name('index_stocks');;
Route::get('/stocks/create', 'StockController@create')->name('create_stocks');
Route::post('/stocks', 'StockController@store')->name('store_stocks');
Route::get('/stocks/{stock}', 'StockController@detail')->name('detail_stock');
Route::get('/stocks/{stock}/edit', 'StockController@edit')->name('edit_stock');
Route::patch('/stocks/{stock}', 'StockController@update')->name('update_stock');
Route::delete('/stocks/{stock}', 'StockController@destroy')->name('destroy_stock');
