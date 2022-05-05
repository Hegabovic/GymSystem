<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\GymController;

use App\Http\Controllers\attendanceController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\PackageController;
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


Route::group(['middleware'=>'auth'],function (){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
  
    Route::get('/create-city-manager', [UserController::class, 'createCityManager'])->name('create_city_manager');
    Route::get('/create-gym-manager', [UserController::class, 'createGymManager'])->name('create_gym_manager');
    Route::get('/show-users', [UserController::class, 'showUsers'])->name('show_users');
    Route::post('/store/{clerk}', [UserController::class, 'store'])->name('store_clerk');
    Route::get('/show-users', [UserController::class, 'showUsers'])->name('show_users');
    Route::get('/edit-profile', [UserController::class, 'edit'])->name('edit_profile');
    Route::put('/edit-profile', [UserController::class, 'update'])->name('edit_profile');

    Route::get('/show-gyms', [GymController::class, 'show'])->name('show_gyms');

    Route::get('/coach', [CoachController::class, 'index'])->name('show_coaches');
    Route::get('/coach-create', [CoachController::class, 'create'])->name('create_coach');
    Route::post('/coach-store', [CoachController::class, 'store'])->name('store_coach');
    Route::get('/coach-edit/{id}', [CoachController::class, 'edit'])->name('update_coach');
    Route::put('/coach-update/{id}', [CoachController::class, 'storeEdit'])->name('store_updated_coach');
  
    Route::get('/trainingSession', [TrainingSessionController::class, 'index'])->name('show_trainingSessions');
    Route::get('/trainingSession-create', [TrainingSessionController::class, 'create'])->name('create_trainingSession');
    Route::post('/trainingSession-store', [TrainingSessionController::class, 'store'])->name('store_trainingSession');
    Route::get('/trainingSession-edit/{id}', [TrainingSessionController::class, 'edit'])->name('update_trainingSession');
    Route::put('/trainingSession-update/{id}', [TrainingSessionController::class, 'storeEdit'])->name('store_updated_trainingSession');
  
    Route::get('/city', [CityController::class, 'index'])->name('show_cities');
    Route::get('/city-create', [CityController::class, 'create'])->name('create');
    Route::post('/city-store', [CityController::class, 'store'])->name('store_city');
    Route::get('/edit/{id}', [CityController::class, 'edit'])->name('city.edit');
    Route::put('/update/{id}', [CityController::class, 'update'])->name('city.update');
  
    Route::get('/attendance', [attendanceController::class, 'show'])->name('show.attendances');
    Route::get('/attendance-create', [attendanceController::class, 'create'])->name('create.attendances');
    Route::post('/attendance-store', [attendanceController::class, 'store'])->name('store.attendances');
    Route::get('/attendance-edit/{id}', [attendanceController::class, 'edit'])->name('edit.attendances');
    Route::put('/attendance-update/{id}', [attendanceController::class, 'update'])->name('update.attendances');

    Route::get('/order', [orderController::class, 'show'])->name('show.order');
    Route::get('/create-order', [orderController::class, 'create'])->name('create.order');

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/packages-create', [PackageController::class, 'create'])->name('packages.create');
    Route::post ('/packages',[PackageController::class,'store'])->name('packages.store');
    Route::get('/packages-edit/{id}',[PackageController::class, 'edit'])->name('packages.edit');
    Route::put('/packages-update/{id}',[PackageController::class, 'update'])->name('packages.update');
   
});

Auth::routes();

