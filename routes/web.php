<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Request\RequestController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/dashboard', [WelcomeController::class, 'dashboard'])->middleware(['auth'])->name('cart.dashboard');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/drinks', DrinkController::class);
});

Route::middleware(['auth'])->name('cart.')->prefix('cart')->group(function () {
    Route::resource('/', CartController::class);
});

Route::middleware(['auth'])->name('request.')->prefix('request')->group(function () {
    Route::resource('/', RequestController::class);
});

require __DIR__.'/auth.php';
