<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ReservationController;
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

Route::get('/',  [WebController::class, 'index'])->name('top');

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('restaurants',RestaurantController::class);

    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::post('favorites/{restaurant_id}', [FavoriteController::class, 'store'])->name('favorites.store');

    Route::delete('favorites/{restaurant_id}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    Route::controller(UserController::class)->group(function () {
        Route::get('users/mypage', 'mypage')->name('mypage');
        Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
        Route::put('users/mypage', 'update')->name('mypage.update');
        Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
        Route::get('users/mypage/reservations', 'reservations')->name('mypage.reservations');
        Route::get('users/mypage/upgrade','upgrade')->name('mypage.upgrade');
        Route::get('users/mypage/downgrade','downgrade')->name('mypage.downgrade');
    });

    Route::resource('reservations', ReservationController::class)->only(['index', 'store', 'update', 'destroy']);

});