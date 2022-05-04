<?php

use App\Http\Controllers\CoachController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;


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

Route::get('coaches-table', [CoachController::class, 'showCoachesTable'])->name('show_coaches_table');
Route::delete('/attendance-delete', 'App\Http\Controllers\attendanceController@delete')->name('delete.attendances');
Route::delete('/gym-delete', [GymController::class, 'delete'])->name('gym.delete');




