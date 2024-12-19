<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripePaymentController;

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


Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('redirect',[HomeController::class, 'redirect']);

Route::get('/view_category',[AdminController::class, 'view_category']);

Route::post('/add_category',[AdminController::class, 'add_category']);

Route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);

Route::get('/view_product',[AdminController::class, 'view_product']);

Route::post('/add_product',[AdminController::class, 'add_product']);

Route::get('/show_product',[AdminController::class, 'show_product']);

Route::get('/delete_product/{id}',[AdminController::class, 'delete_product']);

Route::get('/edit_product/{id}',[AdminController::class, 'edit_product']);

Route::post('/edit_product_confirm/{id}',[AdminController::class, 'edit_product_confirm']);

Route::get('/view_order',[AdminController::class, 'order']);

Route::get('/status_change/{id}',[AdminController::class, 'statusChange']);

Route::get('/print_pdf/{id}',[AdminController::class, 'printPdf']);

Route::get('/search',[AdminController::class, 'searchData']);










Route::get('/product_details/{id}',[HomeController::class, 'product_details']);

Route::post('/add_to_cart/{id}',[HomeController::class, 'addToCart']);

Route::get('/show_cart',[HomeController::class, 'showCart']);

Route::get('/remove_cart_item/{id}',[HomeController::class, 'removeCartItem']);

Route::get('/cash_order',[HomeController::class, 'cashOrder']);

Route::get('/stripe/{totalPrice}',[HomeController::class, 'stripe']);

Route::post('stripe', [HomeController::class, 'stripePost'])->name('stripe.post1');

Route::get('stripe', [AdminController::class, 'stripe'])->name('stripe');
Route::post('stripe-post', [AdminController::class, 'stripePost'])->name('stripe.post');

Route::get('/show_order', [HomeController::class, 'showOrder']);

Route::get('/cancel_order/{id}', [HomeController::class, 'cancelOrder']);

Route:: post('/add_comment', [HomeController::class, 'comment']);

Route:: post('/add_reply', [HomeController::class, 'reply']);