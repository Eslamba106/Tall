<?php

use App\Http\Controllers\Api\AdsController;
use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth',    'middleware' => ['guest:sanctum']], function () {
    Route::post('/login', [AuthController::class,'login'])->name('api.login');
    Route::post('/register', [AuthController::class,'register'])->name('api.register');
});
Route::group(['prefix' => 'ads' ], function () {
    Route::post('/store', [AdsController::class, 'store'])->name('api.ads.store');
    Route::get('/list', [AdsController::class, 'list'])->name('api.ads.list')->middleware( 'auth:sanctum');
});
// Route::domain('{slug}.localhost/tall3.com')->group(function () {
Route::middleware(['tenant.db', 'auth:sanctum'])->get('/check-auth', function (Request $request) {
    return response()->json([
        'message' => 'Authenticated',
        'user' => $request->user()
    ]);
});
