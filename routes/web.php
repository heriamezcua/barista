<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

// Pages
Route::get('/', [PageController::class, 'home'])->name('home');

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login')->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Adminpanel Routes
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy');
    });
});
