<?php

use App\Http\Controllers\MarkAsReadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SLController;

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

Route::get('/', [SLController::class, "getSLInfo"]);

Route::post('/resetRoute', [SLController::class, "reset"])->name("reset"); 

Route::post('/markAsReadRoute', [MarkAsReadController::class, "markAsRead"])->name("markAsRead"); 
