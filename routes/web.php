<?php

use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\users\OrderController;
use App\Http\Controllers\admins\AdminController;
use App\Http\Controllers\Products\ProductController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'products'] , function() {

    Route::get('single-product/{id}', [ProductController::class, 'single_product'])->name('single_product');

    Route::post('single-product/{id}', [ProductController::class, 'add_to_cart'])->name('add_to_cart');
});

Route::group(['prefix' => 'user' , 'middleware' => ['auth:web']] , function () {

    Route::get('orders' , [OrderController::class, 'user_orders_display'])->name('user_orders_display');

    Route::get('bookings' , [OrderController::class, 'user_bookings_display'])->name('user_bookings_display');

    Route::get('bookings_review' , [OrderController::class, 'booking_review_view'])->name('booking_review_view');

    Route::post('bookings_review' , [OrderController::class, 'booking_review'])->name('booking_review');

    Route::get('orders_review' , [OrderController::class, 'order_review_view'])->name('order_review_view');

    Route::post('orders_review' , [OrderController::class, 'order_review'])->name('order_review');
});

Route::get('/cart', [ProductController::class, 'cart'])->name('cart')->middleware('auth:web');

Route::post('/remove_from_cart', [ProductController::class, 'remove_from_cart'])->name('remove_from_cart');

Route::post('/prepare_checkout' , [ProductController::class, 'prepare_checkout'])->name('prepare_checkout');

Route::group(['middleware' => ['check.for.price']] , function (){

    Route::get('/checkout' , [ProductController::class, 'checkout'])->name('checkout');

    Route::post('/checkout' , [ProductController::class, 'process_checkout'])->name('process_checkout_post');

    Route::get('/success' , [ProductController::class, 'payment_success'])->name('payment_success');
});


Route::post('/booking_table' , [ProductController::class, 'booking_tables'])->name('booking_tables');

Route::get('/menu' , [ProductController::class, 'menu'])->name('menu');

Route::get('/services' , [HomeController::class, 'services'])->name('services');

Route::get('/about_us' , [HomeController::class, 'about_us'])->name('about_us');

Route::get('/contact_us' , [HomeController::class, 'contact_us'])->name('contact_us');

Route::group(['prefix' => 'admin'] , function (){
    Route::get('login' , [AdminController::class , 'login'])->name('admin_login');
    Route::post('login' , [AdminController::class , 'login_post'])->name('admin_login_post');
});

Route::group(['prefix' => 'admin' , 'middleware' =>['admin.auth']], function () {
    Route::get('dashboard' , [AdminController::class , 'admin_dashboard'])->name('admin_dashboard');
    Route::get('logout', [AdminController::class , 'logout'])->name('admin_logout');
    // admin dashboard routes
    Route::get('admin_admins' , [AdminController::class, 'admin_admins'])->name('admin_admins');
    Route::get('admin_orders' , [AdminController::class, 'admin_orders'])->name('admin_orders');
    Route::get('admin_products' , [AdminController::class, 'admin_products'])->name('admin_products');
    Route::get('admin_bookings' , [AdminController::class, 'admin_bookings'])->name('admin_bookings');
    // admin status views
    Route::get('admin_booking/status/{id}' , [AdminController::class, 'admin_bookings_status_view'])->name('admin_bookings_status_view');
    Route::get('admin_order/status/{id}' , [AdminController::class, 'admin_orders_status_view'])->name('admin_orders_status_view');
    // admin status update
    Route::patch('admin_booking/status/{id}' , [AdminController::class, 'admin_bookings_status_update'])->name('admin_bookings_status_update');
    Route::patch('admin_order/status/{id}' , [AdminController::class, 'admin_orders_status_update'])->name('admin_orders_status_update');
    // admin create views
    Route::get('admin_products/create' , [AdminController::class, 'admin_products_create_view'])->name('admin_products_create_view');
    Route::get('admin_admins/create' , [AdminController::class, 'admin_admins_create_view'])->name('admin_admins_create_view');
    // admin create routes
    Route::post('admin_products/create' , [AdminController::class, 'admin_products_create'])->name('admin_products_create');
    Route::post('admin_admins/create' , [AdminController::class, 'admin_admins_create'])->name('admin_admins_create');
    // admin delete routes
    Route::post('admin_products/delete{id}' , [AdminController::class, 'admin_products_delete'])->name('admin_products_delete');
    Route::post('admin_orders/delete{id}' , [AdminController::class, 'admin_orders_delete'])->name('admin_orders_delete');
    Route::post('admin_admins/delete{id}' , [AdminController::class, 'admin_admins_delete'])->name('admin_admins_delete');
    Route::post('admin_bookings/delete{id}' , [AdminController::class, 'admin_bookings_delete'])->name('admin_bookings_delete');
});


