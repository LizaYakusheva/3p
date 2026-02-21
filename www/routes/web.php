<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
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
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('course.show');
Route::get('/subscription/{subscription}', [SubscriptionController::class, 'show'])->name('subscription.show');
Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');



Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/cabinet', [AuthController::class, 'cabinet'])->name('cabinet');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/order', [OrderController::class, 'index'])->name('order');
