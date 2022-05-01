<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\attendanceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/create-user', [HomeController::class, 'createUserForm'])->name('create_user');
Route::post('/user/store', [UserController::class, 'store'])->name('store_user');

Route::get('/coach', [CoachController::class, 'index'])->name('show_coaches');
<<<<<<< HEAD
Route::get('/coach/create', [CoachController::class, 'create'])->name('create_coach');
Route::post('/coach/store', [CoachController::class, 'store'])->name('store_coach');
Route::get('/attendance', [attendanceController::class, 'show'])->name('show.attendance');
Route::get('/attendance', [orderController::class, 'show'])->name('show.order');

=======

Route::get('/coach-create', [CoachController::class, 'create'])->name('create_coach');
Route::post('/coach-store', [CoachController::class, 'store'])->name('store_coach');

Route::get('/city', [CityController::class, 'index'])->name('show_cities');

Route::get('/city-create', [CityController::class, 'create'])->name('create');
Route::post('/city/store', [CityController::class, 'store'])->name('store_city');

Route::get('/create-user',[HomeController::class,'createUserForm'])->name('create_user');
Route::post('/user/store',[UserController::class,'store'])->name('store_user');
Route::get('/show-users',[UserController::class,'showUsers'])->name('show_users');
Route::get('/create-customer',[UserController::class,'createCustomer'])->name('create_customer');
>>>>>>> 5de5475a13b2c6c8b5ecc5aae5e0358c28083d7a
Auth::routes();
