<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\IndustrysegmentController;
use App\Http\Controllers\BusinessactivitieController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserbranchController;
use App\Http\Controllers\CustomermasterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialvendorController;
use App\Http\Controllers\VendorbrandController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MaterialInController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('saleschart', [App\Http\Controllers\HomeController::class, 'SalesChart'])->name('saleschart');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('users', UserController::class);
    Route::get('users-statuschange/', [UserController::class, 'statuschange'])->name('users-statuschange');
  
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('industrysegments', IndustrysegmentController::class);
    Route::get('industrysegmentList', [IndustrysegmentController::class, 'IndustrysegmentList'])->name('industrysegments-list');
    Route::resource('businessactivities', BusinessactivitieController::class);
    Route::get('businessactivitieList/', [BusinessactivitieController::class, 'BusinessactivitieList'])->name('businessactivities-list');
    Route::get('businessactivities-statuschange/', [BusinessactivitieController::class, 'statuschange'])->name('businessactivities-statuschange');
  
    Route::resource('uoms', UomController::class);
    Route::get('uomsList/', [UomController::class, 'uomsList'])->name('uoms-list');
    Route::get('uoms-statuschange/', [UomController::class, 'statuschange'])->name('uoms-statuschange');
  
    Route::resource('taxes', TaxController::class);
    Route::get('taxesList/', [TaxController::class, 'taxsList'])->name('taxes-list');
    Route::get('taxes-statuschange/', [TaxController::class, 'statuschange'])->name('taxes-statuschange');
  
    Route::resource('businesses', BusinessController::class);
    Route::get('businessesList/', [BusinessController::class, 'businessesList'])->name('businesses-list');
    Route::get('businesses-statuschange/', [BusinessController::class, 'statuschange'])->name('businesses-statuschange');
  
    Route::resource('branches', BranchController::class);
    Route::get('branchesList/', [BranchController::class, 'branchesList'])->name('branches-list');
    Route::get('branches-statuschange/', [BranchController::class, 'statuschange'])->name('branches-statuschange');
  
    Route::resource('categorys', CategoryController::class);
    Route::get('category-list/', [CategoryController::class, 'categoryList'])->name('category-list');
    Route::get('category-statuschange/', [CategoryController::class, 'statuschange'])->name('category-statuschange');
  
    Route::resource('customermaster', CustomermasterController::class);
    Route::get('customermaster-list/', [CustomermasterController::class, 'customermasterList'])->name('customermaster-list');
     Route::get('get-customer', [CustomermasterController::class, 'getcustomer'])->name('get-customer');
    Route::get('customermaster-statuschange/', [CustomermasterController::class, 'statuschange'])->name('customermaster-statuschange');
  
    Route::resource('userbranches', UserbranchController::class);
    Route::get('userbranchesList/', [UserbranchController::class, 'userbranchesList'])->name('userbranches-list');
    Route::resource('brands', BrandController::class);
    Route::get('brandsList/', [BrandController::class, 'brandsList'])->name('brands-list');
    Route::get('brands-statuschange/', [BrandController::class, 'statuschange'])->name('brands-statuschange');
  
    Route::resource('vendors', VendorController::class);
    Route::get('vendorsList/', [VendorController::class, 'vendorsList'])->name('vendors-list');
    Route::get('vendors-statuschange/', [VendorController::class, 'statuschange'])->name('vendors-statuschange');
  
    Route::resource('subcategorys', SubcategoryController::class);
    Route::get('subcategorys-list/', [SubcategoryController::class, 'subcategorysList'])->name('subcategorys-list');
    Route::get('subcategorys-statuschange/', [SubcategoryController::class, 'statuschange'])->name('subcategorys-statuschange');
  
    Route::resource('material', MaterialController::class);
    Route::get('material-list/', [MaterialController::class, 'materialList'])->name('material-list');
    Route::get('material-statuschange/', [MaterialController::class, 'statuschange'])->name('material-statuschange');
  
    Route::get('state-list/', [HomeController::class, 'stateList'])->name('state-list');
    Route::get('city-list/', [HomeController::class, 'cityList'])->name('city-list');
    Route::resource('materialvendor', MaterialvendorController::class);
    Route::get('materialvendorlist/', [MaterialvendorController::class, 'materialvendorList'])->name('materialvendor-list');
    Route::get('materialvendor-statuschange/', [MaterialvendorController::class, 'statuschange'])->name('materialvendor-statuschange');
  
    Route::resource('vendorbrands', VendorbrandController::class);
    Route::get('vendorbrands-list/', [VendorbrandController::class, 'vendorbrandsList'])->name('vendorbrands-list');
    Route::get('vendorbrands-statuschange/', [VendorbrandController::class, 'statuschange'])->name('vendorbrands-statuschange');

    Route::resource('invoice', InvoiceController::class);
    Route::get('invoice-list/', [InvoiceController::class, 'invoiceList'])->name('invoice-list');
    Route::get('invoice-draft/', [InvoiceController::class, 'invoicedraft'])->name('invoice-draft');
    Route::get('invoice-statuschange/', [InvoiceController::class, 'statuschange'])->name('invoice-statuschange');
  
    Route::resource('inventory', InventoryController::class);
    Route::get('inventory-destroy/{id}', [InventoryController::class, 'destroy'])->name('inventory-destroy');
    Route::get('inventory-list/', [InventoryController::class, 'inventoryList'])->name('inventory-list');

    Route::get('inventory-history', [InventoryController::class, 'inventoryHistory'])->name('inventory.history');

    Route::get('inventory-history-list', [InventoryController::class, 'inventoryHistorylist'])->name('inventory-history-list');
    Route::get('inventory-statuschange/', [InventoryController::class, 'statuschange'])->name('inventory-statuschange');

    Route::resource('materialin', MaterialInController::class);
    Route::get('materialin-list/', [MaterialInController::class, 'materialinList'])->name('materialin-list');
    Route::get('materialin-statuschange/', [MaterialInController::class, 'statuschange'])->name('materialin-statuschange');
    Route::post('material-code', [MaterialInController::class, 'materialCode'])->name('material-code');
    Route::resource('invoice', InvoiceController::class);
    Route::post('invoice-amount', [InvoiceController::class, 'invoiceAmount'])->name('invoice-amount');
    
    Route::post('add-email', [InvoiceController::class, 'addNewEmail'])->name('add-email');
    Route::get('generate-invoice', [InvoiceController::class, 'generateInvoice'])->name('generate-invoice');

    Route::get('invoice-delete/{id}', [InvoiceController::class, 'delete'])->name('invoice-delete');
    
    Route::resource('product', ProductController::class);
    
    Route::post('/import',[ProductController::class,'import'])->name('import');
    Route::post('/fetchselectitem',[ProductController::class,'fetchselectitem'])->name('fetchselectitem');
    Route::post('getquantity', [ProductController::class, 'Getquantity'])->name('getquantity');
    Route::post('getrate', [InvoiceController::class, 'Getrate'])->name('getrate');
     Route::post('getprice', [InvoiceController::class, 'GetPrice'])->name('getprice');
    Route::get('product-list/', [ProductController::class, 'productList'])->name('product-list');
    
});