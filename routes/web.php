<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\Auth\TowFactorAuthentcationController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Responses\TwoFactorConfirmedResponse;

// use Laravel\Fortify\Http\Responses\TwoFactorConfirmedResponse;


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

Route::get('/', [HomeController::class,'index'])
    ->name('home');

Route::get('/products', [productsController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product:slug}', [productsController::class, 'show'])
    ->name('products.show');

Route::resource('cart', CartController::class);

Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout');

Route::post('checkout', [CheckoutController::class, 'store']);

Route::get('auth/user/2fa', [TowFactorAuthentcationController::class, 'index'])
    ->name('front.2fa');
Route::get('auth/2fa/challenge', [TowFactorAuthentcationController::class, 'create'])
    ->name('front.2fa.challenge');
    
// Route::get('/dash', function () {
//     return view('dashboard');
// })
// ->middleware('auth');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// require __DIR__.'/auth.php';

require __DIR__.'/dashboard.php';
