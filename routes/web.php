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
    Route::get('/', [App\Http\Controllers\Client\HomeController::class, 'index'])->name('client.home.index');
});

// admin
// Route::middleware(['web', 'admin_auth'])->group(function () {
// 	Route::prefix('admin')->group(function () {
// 		Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home.index');
// 	});
// });




// Route::middleware(['web', 'auth'])->group(function () {
//     // dashborad
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//     // chatwork
//     Route::prefix('chatworks')->group(function () {
//         // Route::get('/', [App\Http\Controllers\ChatworkController::class, 'index'])->name('chatwork.index.get');
//         // Route::get('/create', [App\Http\Controllers\ChatworkController::class, 'index'])->name('chatwork.schedule.get');
//         // Route::post('/new', [App\Http\Controllers\ChatworkController::class, 'index'])->name('chatwork.schedule.post');
//         Route::get('/setting', [App\Http\Controllers\ChatworkController::class, 'setting'])->name('chatwork.setting.get');
//         Route::post('/setting', [App\Http\Controllers\ChatworkController::class, 'updateSetting'])->name('chatwork.setting.update');
//     });
//     Route::resources(['chatworks' => App\Http\Controllers\ChatworkController::class]);
// });

// Auth::routes();

