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
Route::get('/detail/{produk}', 'ProdukController@produkDetail')->name('produk.detail');

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']])->middleware('admin');
	Route::resource('peran', PeranController::class)->only([
		'index', 'edit'
	])->middleware('admin');
	Route::resource('profil', ProfilController::class)->only([
		'index', 'edit', 'update'
	])->middleware('admin');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::resource('produk', ProdukController::class)->except(['delete'])->middleware('admin');

	Route::resource('obat', ObatController::class)->except(['show', 'delete'])->parameters([
		'obat' => 'id'
	])->middleware('admin');

	Route::resource('alat', AlatController::class)->except(['show', 'delete'])->parameters([
		'alat' => 'alat'
	])->middleware('admin');

	Route::resource('stock', StockController::class)->except(['show', 'delete'])->parameters([
		'stock' => 'stock'
	])->middleware('admin');

	Route::middleware(['auth'])->prefix('cart')->group(function(){
		Route::get('/', 'CartController@index')->name('cart.index');
		Route::get('/tambah-produk/{produk}', 'CartController@addCart')->name('cart.add');
		Route::get('/update/{produk}/{color}/{jenis_kain}', 'CartController@updateCart')->name('cart.update');
		Route::get('/delete/{produk}/{color}/{jenis}', 'CartController@deleteCart')->name('cart.delete');
		Route::get('/checkout', 'CartController@viewCheckout')->name('checkout');
	});


	Route::resource('orders', 'OrderController');

	Route::get('/order', 'OrderController@orderSelf')->name('order.self');
	Route::get('/order/{order}', 'OrderController@show')->name('order.self.view');
	Route::post('/order/{order}/bukti-pembayaran', 'OrderController@addBuktiPembayaran')->name('bukti_pembayaran');
	Route::get('/order/{order}/bukti-pembayaran/download', 'OrderController@downloadBuktiPembayaran')->name('bukti_pembayaran.download');

	Route::get('/order-success','OrderController@orderSuccess')->name('order.success');

	Route::get('/email-checkout','CheckoutController@index');

	Route::get('province', 'CartController@get_province')->name('province');
	Route::get('/city/{id}','CartController@get_city')->name('city');
	Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', 'CartController@get_ongkir')->name('ongkir');

	Route::get('markAsRead/{id}', 'NotificationController@markAsRead')->name('markAsRead');

});

