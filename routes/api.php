<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\API\PaymentController;
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

Route::post('login', [RegisterController::class, 'login']);

Route::post('customer_login', [RegisterController::class, 'customer_login']);
Route::post('send_otp', [CustomerController::class, 'send_otp']);
Route::post('change_password', [CustomerController::class, 'change_password']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group( function () {
    Route::resource('customers', CustomerController::class);
    Route::post('/customers/{id}',[CustomerController::class,'update']);


    Route::resource('payments', PaymentController::class);
});