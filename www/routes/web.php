<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index']);
Route::post('/application', [ApplicationController::class, 'application'])->name('application');
Route::get('/events/{events}', [EventController::class, 'show'])->name('events.show');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('/subscription/{subscription}', [SubscriptionController::class, 'show'])->name('subscription.show');
Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cabinet', [AuthController::class, 'cabinet'])->name('cabinet')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');
Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cartAdd')->middleware('auth');
Route::get('/cart/minus/{id}', [CartController::class, 'minus'])->name('cartMinus')->middleware('auth');
Route::get('/cart/detach/{id}', [CartController::class, 'detach'])->name('cartDetach')->middleware('auth');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cartClear')->middleware('auth');
Route::get('/cart/sum', [CartController::class, 'sum'])->name('cartSum')->middleware('auth');
Route::get('/order', [OrderController::class, 'index'])->name('orderForm')->middleware('auth');
Route::post('/order', [OrderController::class, 'order'])->name('order')->middleware('auth');
Route::get('/order/success', [OrderController::class, 'success'])->name('success')->middleware('auth');
Route::get('/admin/orders', [OrderController::class, 'ordersAdmin'])->name('ordersAdmin')->middleware('auth');
Route::post('/reviews', [MainController::class, 'reviews'])->name('reviews')->middleware('auth');

Route::prefix('/admin')->group(function (){
   Route::resource('events', EventController::class);
   Route::resource('teachers', TeacherController::class);
   Route::resource('subscriptions', SubscriptionController::class);
   Route::resource('courses', CourseController::class);
   Route::resource('products', ProductController::class);
});




