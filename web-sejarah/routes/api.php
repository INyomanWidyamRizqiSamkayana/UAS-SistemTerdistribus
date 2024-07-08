<?php
use App\Http\Controllers\API\DataController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\NewPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);

Route::middleware('auth:sanctum')->group (function() {
    Route::apiResource('daftar', DataController::class);
    Route::post('/daftar/{id}', [DataController::class, 'update']);
    Route::get('/kategori', [DataController::class, 'kategori']);
    Route::post('/kategori', [DataController::class, 'kategori']);
});


