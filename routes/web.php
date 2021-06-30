<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('', [HomeController::class, 'home_index'])->name('home');

// HELPER ROUTES
Route::get('helper', [EmployeeController::class, 'search_helper'])->name('search.helper');
Route::get('helper_profile/{emp_id}', [EmployeeController::class, 'helper_profile'])->name('helper.profile')->middleware('user');
Route::get('helper_details/{emp_id}', [EmployeeController::class, 'show'])->name('profile.pdf');

// CONTACT PAGE ROUTE
Route::get('contact_us', [AddressController::class, 'address_list'])->name('contact');
Route::post('contact_us', [HomeController::class, 'send_fedback'])->name('feedback');

// FAQ's ROUTES
Route::get('faqs', [FaqController::class, 'faq_list'])->name('faq.list');

// SERVIVES ROUTES
Route::get('services', [ServicesController::class, 'services_list'])->name('services.list');

// TRAINING ROUTES
Route::get('training', [PagesController::class, 'training_index'])->name('training');

// ABOOUT US ROUTES
Route::get('about_us', [PagesController::class, 'about_index'])->name('about_us');

// PRIVACY AND POLICY ROUTES
Route::get('privacy_policy', [PagesController::class, 'privacy_index'])->name('privacy');

// PRIVACY AND POLICY ROUTES
Route::get('terms_and_conditions', [PagesController::class, 'terms_index'])->name('terms');

// REGISTER, LOGIN & FORGOT PASSWORD ROUTE
Route::get('customer_register', [AccountController::class, 'register_index'])->name('register');
Route::post('customer_register', [AccountController::class, 'register_data'])->name('register.customer');
Route::get('customer_login', [AccountController::class, 'login_index'])->name('login');
Route::post('customer_login', [AccountController::class, 'login_account'])->name('login.user');

// FORGOT AND RESET PASSWORD
Route::get('customer/forget_password', [AccountController::class, 'forgot_password'])->name('forget.password');
Route::post('customer/forget_password', [AccountController::class, 'generate_token'])->name('forget.password.post');
Route::get('customer/reset_password/{token}', [AccountController::class, 'reset_password']);
Route::post('customer/reset_password', [AccountController::class, 'reset_password_post'])->name('reset.password.post');

// MANAGE CART ROUTE
Route::get('add_cart/{emp_id}', [AccountController::class, 'create_cart'])->name('cart');
Route::get('remove_cart/{key}', [AccountController::class, 'remove_cart_item'])->name('cart.remove');
Route::get('cart', [AccountController::class, 'cart_list'])->name('cart.list');
Route::get('checkout/{order_id?}', [AccountController::class, 'checkout_list'])->name('checkout')->middleware('user');
Route::post('checkout', [AccountController::class, 'checkout_data'])->name('checkout.post')->middleware('user');

// SHORTLIST ROUTE
Route::get('bookings/{order_id?}', [AccountController::class, 'booking_data'])->name('bookings')->middleware('user');

// USER PROFILE ROUTE
Route::get('account', [AccountController::class, 'user_account'])->name('account.user')->middleware('user');

// CHNAGE PASSWORD ROUTE
Route::get('customer/change_password', [AccountController::class, 'change_password'])->name('user.change.password')->middleware('user');
Route::post('customer/change_password', [AccountController::class, 'save_password'])->name('user.change.password.post')->middleware('user');

// USER LOGOUT ROUTE
Route::get('user_logout', [AccountController::class, 'logout_user'])->name('logout.user')->middleware('user');

// BLOG ROUTES
Route::resource('blogs', BlogController::class)->only(['show']);
Route::get('blogs_list', [BlogController::class, 'blog_list'])->name('blog.list');
Route::post('comment', [BlogController::class, 'save_comment'])->name('blog.comment');

// ADMIN LOGIN, FORGOT PASSWORD ROUTE
Route::get('control_panel', [HomeController::class, 'login_index']);
Route::post('login', [HomeController::class, 'login_user'])->name('admin.login');
Route::get('forget_password', [HomeController::class, 'forgot_password'])->name('admin.forget.password');
Route::post('forget_password', [HomeController::class, 'generate_token'])->name('admin.password.token');


Route::group(['middleware' => 'prevent-back-history'], function() {

    Route::group(['prefix' => 'control_panel'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware(['admin','role:ROLE_ADMIN|ROLE_AGENT|ROLE_PARTNER']);
        Route::get('logout', [DashboardController::class, 'logout_admin'])->name('admin.logout')->middleware(['admin','role:ROLE_ADMIN|ROLE_AGENT|ROLE_PARTNER']);

        Route::get('change_password', [DashboardController::class, 'change_password'])->name('change.password');
        Route::post('change_password', [DashboardController::class, 'save_password'])->name('change.password.post');

        // MAID / CAREGIVERS ROUTES
        Route::resource('employee', EmployeeController::class)->middleware(['admin','role:ROLE_ADMIN|ROLE_AGENT|ROLE_PARTNER']);

        // MAID / CAREGIVERS ROUTES
        Route::get('employee/delete_pic/{emp_id}', [EmployeeController::class, 'delete_pic'])->name('delete.image')->middleware(['admin','role:ROLE_ADMIN']);

        // SUB AMDIN ROUTES
        Route::resource('sub_admin', UsersController::class)->middleware(['admin','role:ROLE_ADMIN']);
        Route::get('customer', [UsersController::class, 'customer_list'])->name('customer')->middleware(['admin','role:ROLE_ADMIN']);

        // SERVICES ROUTES
        Route::resource('service', ServicesController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // BANNER ROUTES
        Route::resource('banner', BannerController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // TRAINING ROUTES
        Route::resource('training', TrainingController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // BLOG ROUTES
        Route::resource('blog', BlogController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // FAQ's ROUTES
        Route::resource('faq', FaqController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // TESTIMONIAL ROUTES
        Route::resource('testimonial', TestimonialController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // OFFICE ADDRESS ROUTES
        Route::resource('address', AddressController::class)->middleware(['admin','role:ROLE_ADMIN']);

        // TIME SETTING ROUTES
        Route::resource('setting', SettingController::class)->only('edit','update')->middleware(['admin','role:ROLE_ADMIN']);

        // ORDER ROUTES
        Route::resource('order', OrderController::class)->only([
            'index', 'show'
        ])->middleware(['admin','role:ROLE_ADMIN']);
    });
});
