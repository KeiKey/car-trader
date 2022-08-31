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

Auth::routes();

Route::middleware('auth')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('permission:manage_roles')->except(['show']);

        Route::resource('categories', App\Http\Controllers\CategoryController::class)->middleware('permission:manage_categories')->except(['show']);

        Route::resource('vehicles', App\Http\Controllers\VehicleController::class)->middleware('permission:manage_vehicles');
    });
