<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

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

// Route::get('/' ,function(){
//     return 'test';
// });

Route::resource('/todo', TodoController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy']);

Route::resource('/users', UserController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy']);
