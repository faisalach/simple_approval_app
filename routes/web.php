<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RequestsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(["middleware" =>["guest"]],function (){
    Route::get('/login', [AuthController::class,"login"])->name("login");
    Route::post('/authenticate', [AuthController::class,"authenticate"]);
});
Route::group(["middleware" => ["auth:admin,user"]],function (){
    Route::get('/logout', [AuthController::class,"logout"]);
    
    Route::get('/requests', [RequestsController::class,"show"]);

    Route::group(["middleware" => ["auth:user"]],function (){
        Route::get('/request/create', [RequestsController::class,"create"]);
        Route::post('/request/store', [RequestsController::class,"store"]);
    });
    Route::group(["middleware" => ["auth:admin"]],function (){
        Route::get('/request/approved/{id}', [RequestsController::class,"approved"]);
        Route::get('/request/rejected/{id}', [RequestsController::class,"rejected"]);
    });
});