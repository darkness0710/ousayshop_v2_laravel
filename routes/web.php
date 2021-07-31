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

// client
Route::middleware(['web'])->group(function () {
    // home
    Route::get('/', 'HomeController@index')->name('client.home.index');

    // shops
    Route::get('/shops', 'ShopAccountController@index')->name('client.shops.index');
    Route::get('/shops/{id}', 'ShopAccountController@show')->name('client.shops.show');

    // games
    Route::get('/games', 'GameController@index')->name('client.games.index');
    Route::get('/games/tn3q-china/{slug}', 'GameController@tn3qChinaShow')->name('client.games.tn3q_china.show');
    Route::get('/games/tn3q-china', 'GameController@tn3qChinaIndex')->name('client.games.tn3q_china.index');

    Route::get('/games/tn3q-vn/{slug}', 'GameController@tn3qVnIndex')->name('client.games.tn3q_vn.index');
    Route::get('/games/tn3q-vng', 'GameController@tn3qVnIndex')->name('client.games.tn3q_vn.index');

    Route::get('/games/tan-omg-3q-vng/{slug}', 'GameController@tn3qVnIndex')->name('client.games.tan_omg_3q_vng.index');
    Route::get('/games/tan-omg-3q-vng', 'GameController@tn3qVnIndex')->name('client.games.tan_omg_3q_vng.index');

    Route::get('/games/tan-omg-3q-china/{slug}', 'GameController@tn3qVnIndex')->name('client.games.tan_omg_3q_china.index');
    Route::get('/games/tan-omg-3q-china', 'GameController@tn3qVnIndex')->name('client.games.tan_omg_3q_china.index');

    // new_omg_3q_vng
    // new_omg_3q_china

    // social
    Route::get('/auth/facebook', 'LoginWithFacebookController@redirectFacebook')->name('client.social.facebook.redirect');
    Route::get('/auth/facebook/callback', 'LoginWithFacebookController@facebookCallback')->name('client.social.facebook.callback');
    Route::post('/auth/facebook/logout', 'LoginWithFacebookController@logout')->name('client.social.facebook.logout');
});

