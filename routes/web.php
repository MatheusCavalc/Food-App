<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\ClientOrderDetails;
use App\Http\Livewire\Index;
use App\Http\Livewire\MenuList;
use App\Http\Livewire\MyOrders;
use App\Http\Livewire\OrderDetails;
use App\Http\Livewire\ShoppingCart;
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

Route::get('/', Index::class);
Route::get('/request', MenuList::class)->name('request.index')->middleware('auth');
Route::get('/myorders', MyOrders::class)->middleware('auth')->name('myorders');
Route::get('/dashboard', ShoppingCart::class)->middleware('auth')->name('dashboard');
Route::get('/myorder/{id}', ClientOrderDetails::class)->middleware('auth')->name('order.details');

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/to-admin', [AdminController::class, 'toAdminIndex'])->name('user.admin');
    Route::post('/to-admin', [AdminController::class, 'toAdmin'])->name('to.admin');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders.index');
    Route::get('/order/{id}', OrderDetails::class)->name('order.details');
});


Route::get('payment-cancel',[PaypalController::class,'cancel'])->name('payment.cancel');
Route::get('payment-success',[PaypalController::class,'success'])->name('payment.success');




require __DIR__.'/auth.php';
