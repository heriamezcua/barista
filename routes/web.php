<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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
