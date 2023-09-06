<?php

use App\Enums\UserType;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\CustomerPackageController;
use App\Http\Controllers\Customer\CustomerHistoryController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UsertopupController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//first push
Route::inertia('/login', 'auth/EzepostLogin');
Route::inertia('/home', 'guestpages/HomePage');
Route::inertia('/pricing', 'guestpages/Pricing');
Route::inertia('/download', 'guestpages/Download');
Route::inertia('/signup', 'auth/EzepostSignup');
Route::inertia('/about-us', 'guestpages/AboutUs');
Route::inertia('/contact-us', 'guestpages/ContactUs');
Route::inertia('/blocked', 'customerViews/blocked');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::get('/', [UserController::class, 'showUserDashboard']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/vepost-tracking/pdf/{id}', [PdfController::class, 'index']);
//


Route::get('/forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::middleware(['auth'])->group(function () {
    Route::middleware(["check.permission:" . UserType::TYPE_ADMIN])->group(
        function () {

            Route::get('/admin/dashboard', AdminDashboardController::class);
            Route::get('/admin/packages/today', [PackageController::class, 'packagesRecievedToday']);
            Route::get('/admin/packages/history', [PackageController::class, 'packagesHistory']);
            Route::get('/admin/customers', [CustomerController::class, 'index']);
            Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('customers.update');
            Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
            Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
            Route::post('/block/customer/{id}', [AdminDashboardController::class, 'blockCustomer']);
            Route::post('/unblock/customer/{id}', [AdminDashboardController::class, 'unblockCustomer']);
            
        }
    );
    
    Route::middleware(["check.permission:" . UserType::TYPE_CUSTOMER,'check.blocked'])->group(
        function () {
            Route::get('/customer/dashboard', CustomerController::class);
            Route::get('/customer/pricing', CustomerController::class);
            Route::get('/customer/personal', [PlanController::class, 'index'])->name('personal');
            Route::get('/customer/business', [PlanController::class, 'indexBusiness'])->name('business');
            Route::get('/customer/checkout/{slug}', [PlanController::class, 'create']);
            Route::post('/customer/subscribe', [PlanController::class, 'store']);
            Route::post('/remove-subscription', [PlanController::class, 'cancelSubscription']);
            Route::get('/customer/sent/today', [CustomerPackageController::class, 'packagesSentToday']);
            Route::get('/customer/received/today', [CustomerPackageController::class, 'packagesRecievedToday']);
            Route::get('/customer/viewed/today', [CustomerPackageController::class, 'packagesViewedToday']);
            
            
            //comments
            Route::get('/customer/sent/history', [CustomerHistoryController::class, 'packagesSentHistory']);
            Route::get('/customer/received/history', [CustomerHistoryController::class, 'packagesRecievedHistory']);
            Route::get('/customer/viewed/history', [CustomerHistoryController::class, 'packagesViewedHistory']);

            Route::get('/customer/top-up', [UsertopupController::class, 'index']);
            Route::post('/customer/charge', [UsertopupController::class, 'store']);
            
        }
    );
});
