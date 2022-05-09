<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use App\WebRoute;
use Illuminate\Support\Facades\Route;

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

// auth
Route::middleware('guest')->group(function() {
    Route::get('/', [MemberController::class,'index'])->name(WebRoute::MEMBER_INDEX);
    Route::post('/', [MemberController::class,'create'])->name(WebRoute::MEMBER_CREATE);
    Route::get('/list', [MemberController::class,'list'])->name(WebRoute::MEMBER_LIST);

    Route::namespace('auth')->group(function() {
        Route::post('/authenticate', [AuthController::class, 'authenticate'])->name(WebRoute::AUTH_AUTHENTICATE);
    });
});

Route::middleware('auth')->group(function() {

});


