<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\API\CustomerController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\PopaymentController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('saleschart', [App\Http\Controllers\HomeController::class, 'SalesChart'])->name('saleschart');

Route::get('/customers/{id}',[CustomerController::class,'show']);
Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::get('users-statuschange/', [UserController::class, 'statuschange'])->name('users-statuschange');
   
    Route::get('customers', [UserController::class, 'customers'])->name('customers');
    Route::get('customers-create', [UserController::class, 'customers_create'])->name('customers.create');
    Route::get('customers-edit/{id}', [UserController::class, 'customers_edit'])->name('customers.edit');
    Route::get('customers-delete/{id}', [UserController::class, 'customers_delete'])->name('customers.delete');
  
    Route::get('customer-list/', [UserController::class, 'customerlist'])->name('customer-list');

    Route::get('payments/{id}', [UserController::class, 'payments'])->name('payments');
  
    Route::get('payment-list/', [UserController::class, 'paymentlist'])->name('payment-list');
    Route::get('popayment-list/', [UserController::class, 'popaymentlist'])->name('popayment-list');
    Route::get('monthly-report/', [UserController::class, 'monthly_report'])->name('monthly-report');
    Route::get('po-report/', [UserController::class, 'po_report'])->name('po-report');
    Route::get('po-list/', [UserController::class, 'pomonthlylist'])->name('po-list');
    Route::get('monthly-list/', [UserController::class, 'monthlylist'])->name('monthly-list');
    Route::post('popayments-mainstore/', [UserController::class, 'mainstore'])->name('popayments.mainstore');
  
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
   
    
    Route::resource('popayments', PopaymentController::class);
    Route::post('report', [UserController::class, 'report'])->name('report');
    Route::post('/import',[ProductController::class,'import'])->name('import');
    
});

