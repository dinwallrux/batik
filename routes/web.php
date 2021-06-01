<?php

use App\Http\Controllers\HomeController;
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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('peran', PeranController::class)->only([
		'index', 'edit'
	]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::resource('produk', ProdukController::class)->except(['show', 'delete']);

	Route::resource('obat', ObatController::class)->except(['show', 'delete'])->parameters([
		'obat' => 'id'
	]);

	Route::resource('alat', AlatController::class)->except(['show', 'delete'])->parameters([
		'alat' => 'id'
	]);

	Route::middleware(['auth'])->prefix('cart')->group(function(){
		Route::get('/', 'CartController@index')->name('cart.index');
		Route::get('/tambah-produk/{produk}', 'CartController@addCart')->name('cart.add');
		Route::get('/update/{produk}/{color}', 'CartController@updateCart')->name('cart.update');
		Route::get('/delete/{produk}/{color}', 'CartController@deleteCart')->name('cart.delete');
		Route::get('/checkout', 'CartController@viewCheckout')->name('checkout')->middleware('auth');
	});


	Route::resource('orders', 'OrderController')->middleware('auth');

	Route::get('/order-success','OrderController@orderSuccess')->name('order.success');

	Route::get('/email-checkout','CheckoutController@index');

});

