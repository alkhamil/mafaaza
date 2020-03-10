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
Route::get('/', 'HomeCtrl@index')->name('home.index');

Route::get('/login', 'HomeCtrl@login_form')->name('login.form');
Route::post('/login-proses', 'HomeCtrl@login_proses')->name('login.proses');
Route::get('/add-to-cart/{id}', 'CartCtrl@add_to_cart')->name('add.to.cart');
Route::get('/view-cart', 'CartCtrl@view_cart')->name('view.cart');
Route::get('/checkout', 'HomeCtrl@checkout_form')->name('checkout.form');
Route::post('/checkout-store', 'HomeCtrl@checkout_store')->name('checkout.store');
Route::get('/purchase', 'HomeCtrl@purchase')->name('purchase');
Route::get('/purchase-details/{code}', 'HomeCtrl@purchase_details')->name('purchase.details');


Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/list-order', 'HomeCtrl@list_order_admin')->name('list.order.admin');
    Route::get('/admin/approve/{id}', 'HomeCtrl@approve_order')->name('approve.order');
    Route::get('/admin/disapprove/{id}', 'HomeCtrl@disapprove_order')->name('disapprove.order');

});

Route::get('/admin/logout', 'HomeCtrl@logout')->name('logout');