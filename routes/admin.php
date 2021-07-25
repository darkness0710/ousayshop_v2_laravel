<?php

use Illuminate\Support\Facades\Route;


// admin
Route::middleware(['web', 'admin_auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.dashboard.index');

    Route::resource('shops', 'ShopAccountController', ['as' => 'admin']);

	Route::post('dropzone/store', 'DropzoneController@store')->name('admin.dropzone.store');
	Route::post('dropzone/delete', 'DropzoneController@delete')->name('admin.dropzone.delete');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.auth.login.get');
Route::post('login', 'Auth\LoginController@login')->name('admin.auth.login.post');

Route::post('logout', 'Auth\LoginController@logout')->name('admin.auth.logout.post');