<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FirstController;
use App\Http\Controllers\User\CallbackController;
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

Route::get('/', [FirstController::class, 'index'])->name('main');

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);

    Route::name('admin.')->group(function (){
        Route::resource('categories', CategoryController::class)
            ->except('show');
        Route::resource('products', ProductController::class)
            ->except('show');
    });
});

Route::middleware('auth')->prefix('user')->name('user.')->group(function (){
    Route::get('callbacks', [CallbackController::class, 'index'])->name('callbacks.index');
    Route::get('callbacks/create', [CallbackController::class, 'create'])->name('callbacks.create');
    Route::post('callbacks', [CallbackController::class, 'store'])->name('callbacks.store');
    Route::get('callbacks/{callback}', [CallbackController::class, 'show'])->name('callbacks.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
