<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;



//JWT ROUTES ?
    Route::controller(AuthController::class)->group(function () {
      Route::post('login', 'login');
      Route::post('register', 'register');
      Route::post('logout', 'logout')->middleware('auth:api');
      Route::post('refresh', 'refresh')->middleware('auth:api'); 
    });

  
//API ROUTES
    // Route::middleware(['auth:api'])->prefix('v1')->group(function (){
    Route::get('/markets',[ApiController::class,'index'])->name('markets.index');

    Route::get('/trades',[ApiController::class,'tradesIndex'])->name('trades.index');
    Route::post('/trades',[ApiController::class,'tradeCreate'])->name('trade.create');
    Route::get('/trades/{trade}',[ApiController::class,'tradeShow'])->name('trade.show');
    Route::put('/trades/close/{trade}',[ApiController::class,'tradeClose'])->name('trade.close');

    Route::get('/user-info/{user}',[ApiController::class,'userInfo'])->name('user.index');
    Route::put('/user-info/{user}',[ApiController::class,'userUpdate'])->name('user.update');
  // });