<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\PackageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete('/attendance-delete', 'App\Http\Controllers\attendanceController@delete')->name('delete.attendances');
Route::put('/attendance-restore', 'App\Http\Controllers\attendanceController@restore')->name('restore.attendances');
Route::delete('/city-delete', [CityController::class, 'delete'])->name('delete.city');
Route::put('/city-restore', [CityController::class, 'restore'])->name('restore.city');
Route::delete('/coach-delete', [CoachController::class, 'delete'])->name('coach.delete');
Route::delete('/trainingSession-delete', [TrainingSessionController::class, 'delete'])->name('trainingSession.delete');
Route::delete('/order-delete', 'App\Http\Controllers\orderController@delete')->name('delete.orders');
Route::delete('/packages-delete','App\Http\Controllers\PackageController@delete')->name('packages.delete');
