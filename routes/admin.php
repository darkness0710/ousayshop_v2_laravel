<?php

use Illuminate\Support\Facades\Route;


// admin
Route::middleware(['web', 'admin_auth'])->group(function () {
    // dashboard
    Route::get('/', 'HomeController@index')->name('admin.dashboard.index');

    // shops
    Route::resource('shops', 'ShopAccountController', ['as' => 'admin']);

    // dropzone
    Route::post('dropzone/store', 'DropzoneController@store')->name('admin.dropzone.store');
    Route::post('dropzone/delete', 'DropzoneController@delete')->name('admin.dropzone.delete');

    // users
    Route::get('/users/post', 'UserController@post')->name('admin.users.post');
    Route::resource('users', 'UserController', ['as' => 'admin'])->only(['index']);

    // posts
    Route::resource('posts', 'PostController', ['as' => 'admin']);

    // ckeditor
});

Route::post('ckeditor/upload', 'CkeditorController@upload')->name('admin.ckeditor.upload');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.auth.login.get');
Route::post('login', 'Auth\LoginController@login')->name('admin.auth.login.post');

Route::post('logout', 'Auth\LoginController@logout')->name('admin.auth.logout.post');