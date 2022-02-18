<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/user')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/check', [LoginController::class, 'check_account']);
    Route::post('/signup', [LoginController::class, 'signup']);
    //Route::post('/payment/result', [PaynowController::class, 'resultUrl'])->name('payment-results');

    //Route::middleware('auth:api')->get('/logs', [TransactionController::class, 'logs']);

    //Route::post('/payment', [PaynowController::class, 'payBill']);
    //Route::middleware('auth:api')->get('/all', [UserController::class, 'index']);
    //Route::middleware('auth:api')->post('/payment', [PaynowController::class, 'payBill']);
});
