<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimetableController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/timetables/get-between-dates/{startDate}/{endDate}/{class?}', [TimetableController::class, 'getBetweenDates'])->name('getBetweenDates');
Route::middleware('auth:sanctum')->get('/timetables/get-byclass/{class}', [TimetableController::class, 'getByClass'])->name('getByClass');
Route::middleware('auth:sanctum')->get('/timetables/get-classes', [TimetableController::class, 'getClasses'])->name('getClasses');
