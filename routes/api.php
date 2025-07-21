<?php

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdsController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
});
Route::group(['prefix' => 'auth', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
});
Route::group(['prefix' => 'ads', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/store', [AdsController::class, 'store'])->name('api.ads.store');
    Route::get('/list', [AdsController::class, 'index'])->name('api.ads.list');
    Route::get('/get_cars', [AdsController::class, 'get_cars'])->name('api.ads.get_cars');
    Route::get('/get_models/{id}', [AdsController::class, 'get_models'])->name('api.ads.get_models');
    Route::get('/get_cities', [AdsController::class, 'get_cities'])->name('api.ads.get_cities');
    Route::get('/get_districts/{id}', [AdsController::class, 'get_districts'])->name('api.ads.get_districts');
    Route::get('/get_estate_product', [AdsController::class, 'get_estate_product'])->name('api.ads.get_estate_product');
    Route::get('/get_estate_product_type/{id}', [AdsController::class, 'get_estate_product_type'])->name('api.ads.get_estate_product');
    Route::get('/get_estate_product_transaction/{id}', [AdsController::class, 'get_estate_product_transaction'])->name('api.ads.get_estate_product');
    Route::get('/delete/{id}', [AdsController::class, 'delete'])->name('api.ads.delete');
    Route::get('/change-status/{id}', [AdsController::class, 'updateStatus'])->name('api.ads.updateStatus');
});
Route::group(['prefix' => 'customer', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/store', [CustomerController::class, 'store'])->name('api.customer.store');
    Route::get('/list', [CustomerController::class, 'list'])->name('api.customer.list');
    Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('api.customer.delete');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('api.customer.update');
    Route::get('/get_customer/{id}', [CustomerController::class, 'get_customer'])->name('api.customer.get_customer');

});
Route::group(['prefix' => 'offer', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/store', [OfferController::class, 'store'])->name('api.offer.store');
    Route::get('/list', [OfferController::class, 'list'])->name('api.offer.list');
    Route::get('/delete/{id}', [OfferController::class, 'delete'])->name('api.offer.delete');
    Route::post('/update/{id}', [OfferController::class, 'update'])->name('api.offer.update');
    Route::get('/get_offer/{id}', [OfferController::class, 'get_offer'])->name('api.offer.get_offer');

});
Route::group(['prefix' => 'order', 'middleware' => 'auth:sanctum'], function () {
    Route::post('/store', [OrderController::class, 'store'])->name('api.order.store');
    Route::get('/list', [OrderController::class, 'list'])->name('api.order.list');
    Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('api.order.delete');
    Route::post('/update/{id}', [OrderController::class, 'update'])->name('api.order.update');
    Route::get('/get_order/{id}', [OrderController::class, 'get_order'])->name('api.order.get_order');

});


Route::group(['prefix' => 'subscriptions', 'middleware' => 'auth:sanctum'] ,function () {
    Route::get('/', [SubscriptionController::class, 'index']);
    Route::get('/bills', [SubscriptionController::class, 'bills']);
    Route::get('/profile', [SubscriptionController::class, 'profile']);
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'subscribe']);
    Route::post('/active/{id}', [SubscriptionController::class, 'active']);
});

Route::group(['prefix' => 'settings', 'middleware' => 'auth:sanctum'] ,function () {
    Route::get('/', [SettingsController::class, 'index']);
    Route::post('/update', [SettingsController::class, 'update']);
    Route::get('/theme/{theme}', [SettingsController::class, 'themeUpdate']);
    Route::post('/theme/{theme}', [SettingsController::class, 'themeUpdatePost']);
    Route::get('/export', [SettingsController::class, 'export']);
    Route::post('/export-store', [SettingsController::class, 'exportStore']);
});
Route::middleware('auth:sanctum')->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'edit']);
    Route::put('/', [ProfileController::class, 'update']);
    Route::delete('/', [ProfileController::class, 'destroy']);
    Route::put('/change-password', [ProfileController::class, 'changePassword']);
});
