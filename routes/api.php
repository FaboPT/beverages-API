<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\BeverageTypeController;
use App\Http\Controllers\FavoriteListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('users')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('users.index');
    Route::post('', [UserController::class, 'store'])->name('users.store');
    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('beverages-type')->group(function () {
    Route::get('', [BeverageTypeController::class ,'index'])->name('beverages_type.index');
    Route::post('', [BeverageTypeController::class,'store'])->name('beverages_type.store');
    Route::get('/{id}', [BeverageTypeController::class,'show'])->name('beverages_type.show');
    Route::put('/{id}', [BeverageTypeController::class,'update'])->name('beverages_type.update');
    Route::delete('/{id}', [BeverageTypeController::class,'destroy'])->name('beverages_type.destroy');
});

Route::prefix('beverages')->group(function () {
    Route::get('', [BeverageController::class,'index'])->name('beverage.index');
    Route::post('/', [BeverageController::class,'store'])->name('beverage.store');
    Route::get('/{id}', [BeverageController::class,'show'])->name('beverage.show');
    Route::put('/{id}', [BeverageController::class,'update'])->name('beverage.update');
    Route::delete('/{id}', [BeverageController::class,'destroy'])->name('beverage.destroy');
});

Route::prefix('favorites-list')->group(function () {
    Route::get('', [FavoriteListController::class,'index'])->name('favorites_list.index');
    Route::post('', [FavoriteListController::class,'store'])->name('favorites_list.store');
    Route::get('/{id}', [FavoriteListController::class,'show'])->name('favorites_list.show');
    Route::put('/{id}', [FavoriteListController::class,'update'])->name('favorites_list.update');
    Route::delete('/{id}', [FavoriteListController::class,'destroy'])->name('favorites_list.destroy');
});

