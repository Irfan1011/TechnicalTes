<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Role;
use App\Http\Controllers\Api\SessionController;
use App\Http\Controllers\Api\AdministratorController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\CustomerServiceController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\TransactionController;

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

Route::get('/', function () {
    return view('LandingPage');
});

// Route::group(['middleware'=>['web','auth','verified']], function(){
//     Route::get('/landingPage', 'App\Http\Controllers\SessionController@index')->name('dashboard');
// });

Route::middleware('guest')->group(function () {
    Route::get('register', [SessionController::class, 'createRegister'])->name('register');
    Route::post('register', [SessionController::class, 'storeRegister']);
    Route::get('login', [SessionController::class, 'createLogin'])->name('login');
    Route::post('login', [SessionController::class, 'storeLogin']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionController::class, 'destroyLogin'])->name('logout');
});

Route::group(['middleware' => ['auth', Role::class . ':Administrator']], function () { 
    Route::resource('admin', AdministratorController::class);
});

Route::group(['middleware' => ['auth', Role::class . ':Customer']], function () { 
    Route::get('customer/cart', [CustomerController::class,'cart'])->name('customer.cart');
    Route::resource('customer', CustomerController::class);
    Route::resource('cs1', CustomerServiceController::class);
    Route::get('cart/show', [CartController::class,'showRestore'])->name('cart.showRestore');
    Route::resource('cart', CartController::class);
    Route::delete('cart/destroyPermanent/{id}', [CartController::class, 'destroyPermanent'])->name('cart.destroyPermanent');
    Route::post('cart/restore/{id}', [CartController::class, 'restore'])->name('cart.restore');
    Route::resource('transaction', TransactionController::class);
    Route::get('/search',[CartController::class,'search'])->name('search');
});

Route::group(['middleware' => ['auth', Role::class . ':CustomerService']], function () { 
    Route::get('cs/verif', [CustomerServiceController::class,'verif'])->name('cs.verif');
    Route::patch('cs/verif/{id}', [CustomerServiceController::class,'storeVerif'])->name('cs.storeVerif');
    Route::resource('cs', CustomerServiceController::class);
    Route::resource('customer1', CustomerController::class);
});