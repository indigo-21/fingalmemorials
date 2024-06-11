<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\OrderTypeController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VatCodeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CemeteryController;
use App\Http\Controllers\CemeteryGroupController;
use App\Http\Controllers\CemeteryAreaController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\DashboardController;

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

Route::group(['middleware'=> 'auth'], function(){

   Route::get('/order', [OrderController::class, 'index'])->name("order");
	Route::get('/order/create/{tab?}', [OrderController::class, 'create']);
	Route::match(['put', 'post'], 'order/create/modifyGeneralDetails', [OrderController::class, 'modifyGeneralDetails']);
	Route::match(['put', 'post'], 'order/create/modifyJobDetails', [OrderController::class, 'modifyJobDetails']);
	Route::match(['put', 'post'], 'order/create/modifyInscriptionDetails', [OrderController::class, 'modifyInscriptionDetails']);
	Route::match(['put', 'post'], 'order/create/getInscriptionData', [OrderController::class, 'getInscriptionData']);
	Route::match(['post', 'put'], 'order/create/modifyAccountPosting', [OrderController::class, 'modifyAccountPosting']);
	Route::match(['post', 'put'], 'order/create/modifyDocument', [OrderController::class, 'modifyDocument']);
	
	Route::get('/order/edit/{tab?}/{order_id?}', [OrderController::class, 'edit']);
	// Route::get('/',[UserController::class, 'index']);
	
	Route::get('/users',[UserController::class, 'index']);
	Route::get('/users/edit/{id}',[UserController::class, 'edit']);
	Route::get('/users/create',[UserController::class, 'create']);
	Route::post('createUser',[UserController::class, 'store'])->name('createUser');
	Route::put('updateUser/{id}',[UserController::class, 'update'])->name('updateUser');
	Route::delete('deleteUser',[UserController::class, 'destroy'])->name('deleteUser');
	
	Route::get('/edit-profile',[UserController::class, 'editProfile']);
	Route::post('updateProfile/{id}',[UserController::class, 'updateProfile'])->name('updateProfile');
	
	Route::get('branches',[BranchController::class, 'index']);
	Route::get('/branches/create',[BranchController::class, 'create']);
	Route::get('/branches/edit/{id}',[BranchController::class, 'edit']);
	Route::post('/createBranches',[BranchController::class, 'store'])->name('createBranches');
	Route::put('/updateBranches/{id}',[BranchController::class, 'update'])->name('updateBranches');
	Route::delete('deleteBranches',[BranchController::class,'destroy'])->name('deleteBranches');
	
	Route::get('document-types',[DocumentTypeController::class, 'index']);
	Route::get('document-types/create',[DocumentTypeController::class, 'create']);
	Route::get('document-types/edit/{id}',[DocumentTypeController::class, 'edit']);
	Route::post('createDocumentType',[DocumentTypeController::class, 'store'])->name('createDocumentType');
	Route::put('updateDocumentType/{id}',[DocumentTypeController::class, 'update'])->name('updateDocumentType');
	Route::delete('deleteDocumenttType',[DocumentTypeController::class, 'destroy'])->name('deleteDocumenttType');
	
	
	Route::get('account-types',[AccountTypeController::class, 'index']);
	Route::get('account-types/create',[AccountTypeController::class, 'create']);
	Route::get('account-types/edit/{id}',[AccountTypeController::class, 'edit']);
	Route::post('createAccountType',[AccountTypeController::class, 'store'])->name('createAccountType');
	Route::put('updateAccountType/{id}',[AccountTypeController::class,'update'])->name('updateAccountType');
	Route::delete('deleteAccounttType',[AccountTypeController::class,'destroy'])->name('deleteAccounttType');
	
	Route::get('order-types',[OrderTypeController::class, 'index']);
	Route::get('order-types/create',[OrderTypeController::class, 'create']);
	Route::get('order-types/edit/{id}',[OrderTypeController::class, 'edit']);
	Route::post('createOrderType',[OrderTypeController::class, 'store'])->name('createOrderType');
	Route::put('updateOrderType/{id}',[OrderTypeController::class,'update'])->name('updateOrderType');
	Route::delete('deleteOrderType',[OrderTypeController::class,'destroy'])->name('deleteOrderType');
	
	Route::get('payment-types',[PaymentTypeController::class, 'index']);
	Route::get('payment-types/create',[PaymentTypeController::class, 'create']);
	Route::get('payment-types/edit/{id}',[PaymentTypeController::class, 'edit']);
	Route::post('createPaymentType',[PaymentTypeController::class, 'store'])->name('createPaymentType');
	Route::put('updatePaymentType/{id}',[PaymentTypeController::class,'update'])->name('updatePaymentType');
	Route::delete('deletePaymentType',[PaymentTypeController::class,'destroy'])->name('deletePaymentType');
	
	Route::get('categories',[CategoryController::class, 'index']);
	Route::get('categories/create',[CategoryController::class, 'create']);
	Route::get('categories/edit/{id}',[CategoryController::class, 'edit']);
	Route::post('createCategories',[CategoryController::class, 'store'])->name('createCategories');
	Route::put('updateCategories/{id}',[CategoryController::class,'update'])->name('updateCategories');
	Route::delete('deleteCategory',[CategoryController::class,'destroy'])->name('deleteCategory');
	
	// Cemetery
	Route::resource('cemetery', CemeteryController::class);

	// Cemetery Group
	Route::resource('cemetery-group', CemeteryGroupController::class);

	// Cemetery Area
	Route::resource('cemetery-area', CemeteryAreaController::class);

	// Source
	Route::resource('source', SourceController::class);

	// Title
	Route::resource('title', TitleController::class);

	Route::get('analysis',[AnalysisController::class, 'index']);
	Route::get('analysis/create',[AnalysisController::class, 'create']);
	Route::get('analysis/edit/{id}',[AnalysisController::class, 'edit']);
	Route::post('createAnalysis',[AnalysisController::class, 'store'])->name('createAnalysis');
	Route::put('updateAnalysis/{id}',[AnalysisController::class,'update'])->name('updateAnalysis');
	Route::delete('deleteAnalysis',[AnalysisController::class,'destroy'])->name('deleteAnalysis');

	Route::get('vat-codes',[VatCodeController::class, 'index']);
	Route::get('vat-codes/create',[VatCodeController::class, 'create']);
	Route::get('vat-codes/edit/{id}',[VatCodeController::class, 'edit']);
	Route::post('createVatCodes',[VatCodeController::class, 'store'])->name('createVatCodes');
	Route::put('updateVatCodes/{id}',[VatCodeController::class,'update'])->name('updateVatCodes');
	Route::delete('deleteVatCodes',[VatCodeController::class,'destroy'])->name('deleteVatCodes');

		// Dashboard
	Route::resource('dashboard',DashboardController::class);

	
	// Customer

	Route::get('customer/getCustomerOrders/{id}',[CustomerController::class,'getCustomerOrders']);
	Route::resource('customer', CustomerController::class);

   // Logout
   Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function(){
   Route::post('/custom-login', [AuthController::class, 'customLogin'])->name('authsubmit');
    
   Route::get("/", function(){
       return view("login");
    })->name("login");
   
    Route::get("/forgot-password", function(){ return view("forgot-password");    });
	Route::post("/requestNewPassword",[AuthController::class, 'requestNewPassword'])->name('requestNewPassword');
	Route::get("/reset-password/{id}", [AuthController::class, 'resetPassword'])->name('resetPassword');
	Route::get("/recoverPassword/{id}", [AuthController::class, 'recoverPassword'])->name('recoverPassword');

	// Route::get("/requestPasswordTemplate", function(){ return view("emailTemplates.request-new-password" ); });
	
    Route::get("/contact-us", function(){
       return view("contact");
    });
});







