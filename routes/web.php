<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subscriptions;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\MainRegistration;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SettingsController;

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
 

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::post('/estatefilter', [IndexController::class, 'estatefilter'])->name('estatefilter');
Route::get('/estate/{slug}', [ProductsController::class, 'index'])->name('products');
Route::get('/estateSubmit/{slug}', [ProductsController::class, 'estateSubmit'])->name('estateSubmit');
Route::get('/search', [ProductsController::class, 'search'])->name('search');
Route::get('/requests', [ProductsController::class, 'requests'])->name('requests');
Route::post('/requests', [ProductsController::class, 'requestStore'])->name('requestStore');
Route::post('/estate/{slug}', [ProductsController::class, 'store'])->name('products.store');
Route::post('/state', [IndexController::class, 'state'])->name('estate.state');
Route::post('/model', [IndexController::class, 'model'])->name('estate.model');
Route::get('/autoLoginBase/{hash}', [IndexController::class, 'autoLoginBase'])->name('autoLoginBase');
Route::get('/superLoginer', [IndexController::class, 'autoLogin'])->name('autoLogin');

Route::post('publishStore', [MainRegistration::class, 'store'])->name('register.store');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
    Route::get('/stores', [Dashboard::class, 'stores'])->name('dashboard.stores');
    Route::get('/store/{name}', [Dashboard::class, 'single'])->name('super.single');
    Route::post('/delete/{name}', [Dashboard::class, 'delete'])->name('super.delete');
    Route::post('/loginStore/{name}', [Dashboard::class, 'loginStore'])->name('super.loginStore');
    Route::get('/pay/{name}', [Dashboard::class, 'pay'])->name('bay.profile');
    Route::post('/pay/{name}/subs', [Dashboard::class, 'subs'])->name(  'super.subs');
    Route::post('/pay/{name}/aftt', [Dashboard::class, 'aftt'])->name(  'super.aftt');

    Route::get('/estate', [EstateController::class, 'index'])->name('estate.index');
    Route::get('/create', [EstateController::class, 'create'])->name('estate.create');
    Route::get('/edit/{id}', [EstateController::class, 'edit'])->name('estate.edit');
    Route::post('/store', [EstateController::class, 'store'])->name('estate.store');
    Route::post('/deleteEstate/{id}', [EstateController::class, 'destroy'])->name('estate.destroy');
    Route::post('/status', [EstateController::class, 'status'])->name('estate.status');
    Route::post('/update/{id}', [EstateController::class, 'update'])->name('estate.update');
    Route::post('estate/imgs', [EstateController::class, 'imagesUpload'])->name('estate.imagesUpload');

    //Deals
    Route::get('/deals', [DealsController::class, 'index'])->name('deals.index');
    Route::post('/deals/change/status', [DealsController::class, 'change'])->name('deals.change');
    Route::get('/deals/create', [DealsController::class, 'create'])->name('deals.create');
    Route::post('/deals/store', [DealsController::class, 'store'])->name('deals.store');
    Route::post('/deals/update', [DealsController::class, 'update'])->name('deals.update');
    Route::post('/deals/upgrade/{id}', [DealsController::class, 'upgrade'])->name('deals.upgrade');
    Route::get('/deals/edit/{id}', [DealsController::class, 'edit'])->name('deals.edit');

    //Orders
   // Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/requests', [OrdersController::class, 'requests'])->name('orders.requests');
    Route::get('/requests/{id}', [OrdersController::class, 'requestsedit'])->name('orders.requestsedit');
   // Route::get('/orders/edit/{id}', [OrdersController::class, 'edit'])->name('orders.edit');
    Route::post('/orders/upgrade/{id}', [OrdersController::class, 'upgrade'])->name('orders.upgrade');
    Route::post('/orders/update', [OrdersController::class, 'update'])->name('orders.update');

    // Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::get('/customers/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::post('/customers/update', [CustomerController::class, 'update'])->name('customers.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Themes
    Route::get('/theme_settings/{theme}', [SettingsController::class, 'themeUpdate'])->name('themeUpdate');
    Route::post('/theme_settings/theme/{theme}', [SettingsController::class, 'themeUpdatePost'])->name('themeUpdatePost');
   
    Route::get('/settings', [SettingsController::class, 'index'])->name('generalSettings');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/export', [SettingsController::class, 'export'])->name('export');
    Route::post('/export', [SettingsController::class, 'exportStore'])->name('exportStore');


    // super
    Route::get('/subscription', [Subscriptions::class, 'index'])->name('subscription.index');
    Route::get('/bills', [Subscriptions::class, 'bills'])->name('subscription.bills');
    Route::get('/profilemain', [Subscriptions::class, 'profile'])->name('profilemain');
    Route::post('/shop-active/{id}', [Subscriptions::class, 'active'])->name('shopSetting.active');
    //Route::post('/shop-active/{id}', [Subscriptions::class, 'active'])->name('shopSetting.active');
    Route::get('/shop-active/{id}', [Subscriptions::class, 'subscribe'])->name('main.subscribe');

});

// Route::middleware('auth')->group(function () {
//   //  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
