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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('peran', PeranController::class)->only([
		'index', 'edit'
	]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::resource('motif', MotifController::class)->except(['show', 'delete'])->parameters([
		'motif' => 'id'
	]);

	Route::resource('obat', ObatController::class)->except(['show', 'delete'])->parameters([
		'obat' => 'id'
	]);

	Route::resource('bahan', BahanController::class)->except(['show', 'delete'])->parameters([
		'bahan' => 'id'
	]);
});

