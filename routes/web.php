<?php

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForecastsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TradeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//MPA ROUTES
Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('about',[Controller::class,'retrieveReviews']);
Route::get('contact-page',fn() => view('contact-page'))->name('contact');
Route::get('accounts',fn() =>  view('accounts'));
Route::get('register',fn()=> view('register'));
Route::post('register',[Controller::class,'register']);
Route::post('login',[Controller::class,'login'])->name('login');
Route::get('login',[Controller::class,'loginPage']);
Route::post('contacted',[UserController::class,'contactPage']);


// Logged in Routes
Route::middleware('auth')->group(function () {
Route::get('dashboard',function(){ return view('auth-views.dashboard');})->name('dashboard');
Route::get('charts',function(){ return view('auth-views.charts');})->name('charts');
Route::get('deposit-wd',[UserController::class,'requestsList'])->name('deposit-wd');
Route::get('profile',function (){ return view('auth-views.profile');});
Route::post('profile-pfp', [UserController::class, 'savePfp'])->name('profile-pfp');
Route::post('/logout',[Controller::class,'logout']);
Route::get('support',function(){ return view('auth-views.support');})->name('support-get');
Route::post('support',[UserController::class,'contact'])->name('support');
Route::post('save-request-to-db',[UserController::class,'saveDepositWd']);
Route::get('/chart-data', [UserController::class, 'getChartData']); //for balance data chart.js
});
Route::post('/verification-documents', [UserController::class,'storeDocs'])->name('verification-documents.store');

//FORUM ROUTES 
Route::middleware('auth')->group(function () {
    Route::get('/forum', [PostController::class, 'index'])->name('forum.index');
    Route::get('/forum/create', [PostController::class, 'create'])->name('forum.create');
    Route::post('/forum', [PostController::class, 'store'])->name('forum.store');
    Route::get('/forum/{post}', [PostController::class, 'show'])->name('forum.show');
    Route::get('/forum/{post}/edit', [PostController::class, 'edit'])->name('forum.edit');
    Route::put('/forum/{post}', [PostController::class, 'update'])->name('forum.update');
    Route::delete('/forum/{post}', [PostController::class, 'destroy'])->name('forum.destroy');

});

//Trading 

Route::post('/trade', [TradeController::class, 'store'])->name('trade.store');
Route::get('/trades', [TradeController::class, 'showOpenTrades'])->name('trade.index');
Route::post('/trades/{id}/close', [TradeController::class, 'closeTrade'])->name('trade.close');
Route::get('/trade-history', [TradeController::class, 'showTradeHistory'])->name('trade.history');

//Signaling algo
Route::get('signals',[ForecastsController::class,'index']);
