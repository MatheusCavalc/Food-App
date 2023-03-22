<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
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
Route::get('/request', [WelcomeController::class, 'requestIndex'])->name('request.index')->middleware('auth');
Route::get('/myorders', [WelcomeController::class, 'myOrders'])->middleware('auth')->name('myorders');
Route::get('/myorder/{id}', [WelcomeController::class, 'myOrderDetails'])->middleware('auth')->name('order.details');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/to-admin', [AdminController::class, 'toAdminIndex'])->name('user.admin');
    Route::post('/to-admin', [AdminController::class, 'toAdmin'])->name('to.admin');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders.index');
    Route::get('/order/{id}', [AdminController::class, 'ordersDetails'])->name('order.details');
});


Route::get('payment-cancel',[PaypalController::class,'cancel'])->name('payment.cancel');
Route::get('payment-success',[PaypalController::class,'success'])->name('payment.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');


require __DIR__.'/auth.php';
