<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmailVerificationController;
use App\Http\Controllers\CityController;

use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\CoachController;
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

Route::group(['middleware'=>['auth:sanctum','verified']],function (){
    Route::get('/training-sessions/{id}/attend',[ApiUserController::class,'attend']);
});
Route::post('/customer/register',[AuthController::class,'register'])->name('customer-register');
Route::post('/login',[AuthController::class,'login'])->name('customer-login');
Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail'])->middleware('auth:sanctum');
Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify')->middleware('auth:sanctum');

Route::post('/customer/register',[ApiUserController::class,'register'])->name('customer-register');


Route::get('coaches-table', [CoachController::class, 'showCoachesTable'])->name('show_coaches_table');
Route::delete('/attendance-delete', 'App\Http\Controllers\attendanceController@delete')->name('delete.attendances');






Route::delete('/city-delete', [CityController::class, 'delete'])->name('delete.city');
Route::put('/city-restore',[CityController::class,'restore'])->name('restore.city');
Route::delete('/coach-delete', [CoachController::class, 'delete'])->name('coach.delete');
Route::delete('/order-delete', 'App\Http\Controllers\orderController@delete')->name('delete.orders');

