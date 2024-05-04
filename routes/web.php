<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/success', [PageController::class, 'success'])->name('success');

// Pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/account', [PageController::class, 'account'])->name('account')->middleware('auth');
Route::get('/product/{id}', [PageController::class, 'product'])->name('product');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout')->middleware('auth');

// Cart
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('removeFromCart');

// Wishlist
Route::post('/add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('addToWishlist')->middleware('auth');
Route::post('/remove-from-wishlist/{id}', [WishlistController::class, 'removeFromWishlist'])->name('removeFromWishlist')->middleware('auth');


// Stripe
Route::post('/stripe-checkout', [CheckoutController::class, 'stripeCheckout'])->name('stripeCheckout')->middleware('auth');

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');

Route::post('/register', [AuthController::class, 'registerUser'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login')->middleware('guest');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Adminpanel Routes
Route::group(['prefix' => 'adminpanel', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    // Products
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.products.store');
        Route::get('/{id}', [ProductController::class, 'edit'])->name('adminpanel.products.edit');
        Route::put('/{id}', [ProductController::class, 'update'])->name('adminpanel.products.edit');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('adminpanel.products.destroy');
    });

    // Orders
    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('adminpanel.orders');
        Route::get('/{id}', [OrderController::class, 'view'])->name('adminpanel.orders.view');
        Route::post('/{id}', [OrderController::class, 'updateStatus'])->name('adminpanel.orders.status.update');
    });
});
