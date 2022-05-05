<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\GymController;

use App\Http\Controllers\attendanceController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PackageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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
Route::get('/create-city-manager', [UserController::class, 'createCityManager'])->name('create_city_manager');
Route::get('/create-gym-manager', [UserController::class, 'createGymManager'])->name('create_gym_manager');

Route::post('/store-gym-manager', [UserController::class, 'storeGymManager'])->name('store_gym_manager');
Route::post('/store-city-manager', [UserController::class, 'storeCityManager'])->name('store_city_manager');
Route::get('/show-users', [UserController::class, 'showUsers'])->name('show_users');

Route::post('/store/{clerk}',[UserController::class,'store'])->name('store_clerk');
//Route::post('/store-city-manager',[UserController::class,'storeCityManager'])->name('store_city_manager');
Route::get('/show-users',[UserController::class,'showUsers'])->name('show_users');


Route::get('/show-gyms', [GymController::class, 'show'])->name('show_gyms');
Route::get('/gyms/edit/{id}',[GymController::class,'edit'])->name('edit.gyms');
Route::get('/gym-store/{id}',[GymController::class,'storeUpdate'])->name('store_gyms');

Route::get('/create-gym',[GymController::class,'create'])->name('create_gyms');
Route::post('/create-store', [GymController::class, 'store'])->name('store_gym');


Route::post('/user-store', [UserController::class, 'store'])->name('store_user');

Route::get('/coach', [CoachController::class, 'index'])->name('show_coaches');
Route::get('/coach-create', [CoachController::class, 'create'])->name('create_coach');
Route::post('/coach-store', [CoachController::class, 'store'])->name('store_coach');

Route::get('/city', [CityController::class, 'index'])->name('show_cities');
Route::get('/city-create', [CityController::class, 'create'])->name('create');
Route::post('/city-store', [CityController::class, 'store'])->name('store_city');
Route::delete('/city-delete', [CityController::class, 'delete'])->name('delete_city');

Route::get('/attendance', [attendanceController::class, 'show'])->name('show.attendances');
//next two routes should be in Api
Route::get('/attendance-create', [attendanceController::class, 'create'])->name('create.attendances');
Route::post('/attendance-store', [attendanceController::class, 'store'])->name('store.attendances');
// Route::post('/attendance-delete', [attendanceController::class, 'delete'])->name('delete.attendances');

Route::get('/order', [orderController::class, 'show'])->name('show.order');
Route::get('/create-order', [orderController::class, 'create'])->name('create.order');


Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
Route::get('/packages-create', [PackageController::class, 'create'])->name('packages.create');


Auth::routes();

