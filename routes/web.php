<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/Availble-gymes',[GymesController::class,'AvailbleGymes'])->name('Availble-gymes');
Route::post('/user/store', [UserController::class, 'store'])->name('store_user');
Route::get('/coach', [CoachController::class, 'index'])->name('show_coaches');
Route::get('/coach-create', [CoachController::class, 'create'])->name('create_coach');
Route::post('/coach-store', [CoachController::class, 'store'])->name('store_coach');

Auth::routes();
