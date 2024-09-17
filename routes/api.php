<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TokenController;

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
Route::options('/{any}', function (Request $request) {
    return response()->json([], 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, X-API-KEY, Authorization');
})->where('any', '.*');

Route::middleware('api')->group(function () {
    Route::get('/csrf-token', function () {
        return response()->json(['csrf_token' => csrf_token()]);
    });
});

Route::get('/some-api-endpoint', function () {
    return response()->json(['message' => 'Hello World']);
});

// Public routes (no API key required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated routes (require Sanctum token and API key)
Route::middleware(['api.key', 'auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/token-details', [TokenController::class, 'show']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});