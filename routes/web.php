<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsrfTokenController;

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
// routes/web.php
Route::get('/csrf-token', [CsrfTokenController::class, 'getToken']);

Route::get('/', function () {
    return view('welcome');
});