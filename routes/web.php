<?php

use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BulkPriceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DrawerOrderController;
use App\Http\Controllers\DrawerProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WishlistController;
use App\Models\DrawerProduct;

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

Route::get('/pdf/{id}', [PdfController::class, 'createSalesInvoice']);

// Authenticated Admin Routes
Route::middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('select/option', [HomeController::class, 'selectOptions'])->name('select.option');
    Route::post('select/editOption', [HomeController::class, 'selectEditOptions'])->name('select.editOption');
    Route::post('select/updateOption', [HomeController::class, 'selectUpdateOptions'])->name('select.updateOption');
    Route::delete('select/option/{id}', [HomeController::class, 'selectOptionDestroy'])->name('select.option.destroy');


    // Dashboard Routes
    Route::prefix('admin')->group(function () {

        // profile
        Route::prefix('profile')->group(function () {
            Route::get('', [ProfileController::class, 'index'])->name('profile');
            Route::patch('{user}/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
        });

        // bulk-prices
        Route::resource('bulk-prices', BulkPriceController::class);
        Route::post('bulk-prices/import', [BulkPriceController::class, 'importPrices'])->name('bulk-prices.import');

        // User Routes
        Route::resource('user', UserController::class);

        // Product Routes
        Route::resource('product', DrawerProductController::class);
        Route::post('product/increase/price', [DrawerProductController::class, 'increasePrice'])->name('increase.price');

        // city Routes
        Route::resource('city', CityController::class);
        Route::post('city/import', [CityController::class, 'import'])->name('city.import');

         //order
         Route::get('order', [HomeController::class, 'orderindex'])->name('order');

         //payment
         Route::get('paymentindex',[HomeController::class, 'paymentindex'])->name('paymentindex');
         
        // custom
        Route::post('custom', [CustomController::class, 'update'])->name('custom');
    });
});

// Authenticated Customer Routes
Route::middleware('auth')->group(function () {

    // order routes
    Route::post('place-order', [DrawerOrderController::class, 'placeOrder'])->name('place.order');
    Route::get('place-order/edit', [DrawerOrderController::class, 'placeOrderEdit'])->name('place.order.edit');
    Route::get('item/remove/{id}/', [DrawerOrderController::class, 'removeItem'])->name('remove.item');
    Route::post('place-order/update', [DrawerOrderController::class, 'placeOrderUpdate'])->name('place.order.update');
    Route::get('cart', [DrawerOrderController::class, 'cart'])->name('cart');
    Route::post('cart', [DrawerOrderController::class, 'backCart'])->name('backCart');

    // account
    Route::get('/account', [CustomerController::class, 'index'])->name('account');
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('/account/billing_details/update', [CustomerController::class, 'billingDetailsUpdate'])->name('account.billing.details.update');
    Route::post('/account/basic_details/update', [CustomerController::class, 'basicDetailsUpdate'])->name('account.basic.details.update');

    // Checkout routes
    Route::get('/summary', [DrawerOrderController::class, 'summary'])->name('summary');
    Route::post('/checkout', [DrawerOrderController::class, 'checkout'])->name('checkout');
    Route::get('/checkout', [DrawerOrderController::class, 'checkoutForm'])->name('checkout.form');
    // Route::get('/payment', [PaymentLogController::class, 'pay'])->name('pay');
    Route::post('/payment', [DrawerOrderController::class, 'payment'])->name('payment');
    Route::post('/pay', [PaymentLogController::class, 'pay'])->name('payStore');
    Route::post('/dopay/online', [PaymentLogController::class, 'handleonlinepay'])->name('dopay.online');

    // wishlist Route
    Route::post('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeItem'])->name('wishlist.remove');
    Route::get('/wishlist/continue/{id}/order', [WishlistController::class, 'continueOrder'])->name('continue.order');

    // Others
    Route::get('/addNewItem', [HomeController::class, 'addNewItem'])->name('addNewItem');
    Route::get('/getProductImage', [HomeController::class, 'getProductImage'])->name('getProductImage');
    Route::get('/changeUnit', [HomeController::class, 'changeUnit'])->name('changeUnit');
    Route::get('/delivery/fee', [DrawerOrderController::class, 'deliveryFee'])->name('delivery.price');
    Route::get('/download/{orderId}/invoice/{type}', [HomeController::class, 'downloadPdf'])->name('download.pdf');
});

// Admin Authorization Routes
Route::middleware('guest:admin')->group(function () {
    // Admin
    Route::prefix('login')->group(function () {
        Route::get('/admin', [AdminLoginController::class, 'login'])->name('login.admin');
        Route::post('/admin', [AdminLoginController::class, 'authentication'])->name('login.admin');
    });
});



Route::middleware('guest')->group(function () {

    // Authorization Routes
    Route::prefix('login')->group(function () {
        // Customer
        Route::get('/', [LoginController::class, 'login'])->name('login');
        Route::post('/', [LoginController::class, 'authentication'])->name('login');

        //Admin
        // Route::get('/admin', [AdminLoginController::class, 'login'])->name('login.admin');
        // Route::post('/admin', [AdminLoginController::class, 'authentication'])->name('login.admin');
    });

    Route::prefix('register')->group(function () {
        // Customer
        Route::get('/', [RegisterController::class, 'index'])->name('register');
        Route::post('/', [RegisterController::class, 'registeration'])->name('register');
    });

    // Forget Password Routes
    Route::name('forget.password.')->group(function () {
        Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('get');
        Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('post');
    });
    // Reset Password Routes
    Route::name('reset.password.')->group(function () {
        Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('get');
        Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('post');
    });
});

// validate index form
Route::post('/ajax/validate/form', [HomeController::class, 'ajaxFormValidation'])->name('ajaxOrderValidation');
Route::get('/ajax/validate/wishlist/name', [HomeController::class, 'ajaxValidateWishlistName'])->name('ajaxValidateWishlistName');


// Home Navbar Navigration routes
Route::get('faq', function () {
    return "FAQ PAGE";
})->name('faq');

Route::get('terms', function () {
    return "TERMS PAGE";
})->name('terms');

Route::get('contact', function () {
    return "CONTACT PAGE";
})->name('contact');

// Test Route
Route::get('/test', [TestController::class, 'index']);
Route::get('/test/1', [TestController::class, 'test']);


// Logout
Route::get('/logout', function () {
    $location = 'login';

    if (auth()->guard() == 'admin') {
        $location = 'login/admin';
    }

    Session::flush();
    Auth::logout();
    return redirect($location);
})->name('logout');
