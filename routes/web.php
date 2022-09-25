<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DrinkController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;
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

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});
    Route::get('/myorders', [OrderController::class, 'myOrders'])->middleware('auth')->name('myorders');



Route::get('payment-cancel',[PaypalController::class,'cancel'])
    ->name('payment.cancel');
Route::get('payment-success',[PaypalController::class,'success'])
    ->name('payment.success');



Route::middleware(['auth'])->name('request.')->prefix('request')->group(function () {
    Route::get('/', [WelcomeController::class, 'requestIndex'])->name('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';

