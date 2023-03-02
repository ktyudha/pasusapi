<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/auth/login',[LoginController::class, 'login']);

// Route::get('/events',[EventController::class, 'index'])->name('event.index');
// Route::get('/events/{event}',[EventController::class, 'show'])->name('event.show');
Route::middleware('auth:sanctum')->group( function () {

    Route::apiResources([
        'events' => EventController::class,
    ]);
    Route::post('/auth/logout',[LogoutController::class, 'logout']);
    Route::get('/user',[LoginController::class, 'user']);

});
