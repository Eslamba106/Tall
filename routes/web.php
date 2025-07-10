<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\Subscriptions;
use App\Http\Controllers\DealsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\MainRegistration;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\admin\CustomerController;

use App\Http\Controllers\LanguageController;
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


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
    Route::get('/dash', [Dashboard::class, 'user_dashboard'])->name('user.dashboard');
    Route::get('/stores', [Dashboard::class, 'stores'])->name('dashboard.stores');
    Route::get('/store/{name}', [Dashboard::class, 'single'])->name('super.single');
    Route::post('/delete/{name}', [Dashboard::class, 'delete'])->name('super.delete');
    Route::post('/loginStore/{name}', [Dashboard::class, 'loginStore'])->name('super.loginStore');
    Route::get('/pay/{name}', [Dashboard::class, 'pay'])->name('bay.profile');
    Route::post('/pay/{name}/subs', [Dashboard::class, 'subs'])->name('super.subs');
    Route::post('/pay/{name}/aftt', [Dashboard::class, 'aftt'])->name('super.aftt');

    Route::get('/estate', [EstateController::class, 'index'])->name('estate.index');
    Route::get('/create', [EstateController::class, 'create'])->name('estate.create');
    Route::get('/edit/{id}', [EstateController::class, 'edit'])->name('estate.edit');
    Route::post('/store', [EstateController::class, 'storeOrUpdate'])->name('estate.store');
    Route::post('/deleteEstate/{id}', [EstateController::class, 'destroy'])->name('estate.destroy');
    Route::post('/status', [EstateController::class, 'status'])->name('estate.status');
    Route::post('/update/{id}', [EstateController::class, 'update'])->name('estate.update');
    Route::post('estate/imgs', [EstateController::class, 'imagesUpload'])->name('estate.imagesUpload');

    // Ads 
    Route::group(['prefix' => 'ads'], function () {
        Route::get('/create', [AdsController::class, 'create'])->name('ads.create');
        Route::get('/get_models/{id}', [AdsController::class, 'get_models'])->name('ads.get_models');
        Route::get('/get_districts/{id}', [AdsController::class, 'get_districts_by_id'])->name('ads.get_districts');
        Route::post('/store', [AdsController::class, 'store'])->name('ads.store');
        Route::get('/list', [AdsController::class, 'list'])->name('ads.list');
        Route::get('/get_cars', [AdsController::class, 'get_cars'])->name('ads.get_cars');
        Route::get('/get_models/{id}', [AdsController::class, 'get_models'])->name('ads.get_models');
        Route::get('/get_cities', [AdsController::class, 'get_cities'])->name('ads.get_cities');
        // Route::get('/get_districts/{id}', [AdsController::class, 'get_districts'])->name('ads.get_districts');
        Route::get('/get_estate_product', [AdsController::class, 'get_estate_product'])->name('ads.get_estate_product');
        Route::get('/get_estate_product_type/{id}', [AdsController::class, 'get_estate_product_type'])->name('ads.get_estate_product');
        Route::get('/get_estate_product_transaction/{id}', [AdsController::class, 'get_estate_product_transaction'])->name('ads.get_estate_product');
        Route::get('/delete/{id}', [AdsController::class, 'delete'])->name('ads.delete');
        Route::get('/change-status/{id}', [AdsController::class, 'updateStatus'])->name('ads.updateStatus');
        Route::get('/show/{id}', [AdsController::class, 'show'])->name('ads.show');
    });

    Route::group(['prefix' => 'customer' ], function () {
    Route::post('/store', [CustomerController::class, 'store'])->name('admin.customer.store');
    Route::get('/list', [CustomerController::class, 'list'])->name('admin.customer.list'); 
    Route::get('/delete', [CustomerController::class, 'delete'])->name('admin.customer.delete');
    Route::post('/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::get('/get_customer/{id}', [CustomerController::class, 'get_customer'])->name('admin.customer.get_customer');
    Route::get('/create', [CustomerController::class, 'create'])->name('admin.customer.create');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.customer.edit');
    

});
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

    Route::group(['prefix' => 'general-settings'], function () {
        Route::get('', [GeneralController::class, 'index'])->name('admin.business-settings.language.index');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('/store', [OrderController::class, 'store'])->name('order.store');
        Route::get('/list', [OrderController::class, 'list'])->name('order.list');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
        Route::post('/update/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::get('/get_order/{id}', [OrderController::class, 'get_order'])->name('order.get_order');
    });
});





// Route::middleware('auth')->group(function () {
//   //  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
Route::group(['prefix' => 'language'], function () {
    Route::get('', [LanguageController::class, 'index'])->name('admin.business-settings.language.index');
    Route::post('add-new', [LanguageController::class, 'store'])->name('admin.business-settings.language.add-new');
    Route::get('update-status', [LanguageController::class, 'update_status'])->name('admin.business-settings.language.update-status');
    Route::get('update-default-status', [LanguageController::class, 'update_default_status'])->name('admin.business-settings.language.update-default-status');
    Route::post('update', [LanguageController::class, 'update'])->name('admin.business-settings.language.update');
    Route::get('translate/{lang}', [LanguageController::class, 'translate'])->name('admin.business-settings.language.translate');
    Route::get('translate-list/{lang}', [LanguageController::class, 'translate_list'])->name('admin.business-settings.language.translate.list');
    Route::post('translate-submit/{lang}', [LanguageController::class, 'translate_submit'])->name('admin.business-settings.language.translate-submit');
    Route::post('remove-key/{lang}', [LanguageController::class, 'translate_key_remove'])->name('admin.business-settings.language.remove-key');
    Route::get('delete/{lang}', [LanguageController::class, 'delete'])->name('admin.business-settings.language.delete');
    Route::any('auto-translate/{lang}', [LanguageController::class, 'auto_translate'])->name('admin.business-settings.language.auto-translate');
});
require __DIR__ . '/auth.php';
