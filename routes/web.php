<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MarketController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

//--AUTH--//
#login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

//--ADMIN PANEL--//
Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])
        ->name('dashboard');

    //market
    Route::get('/market', [MarketController::class, 'index'])
        ->name('market');

    //config
    Route::get('/configuration', [ConfigurationController::class, 'index'])
        ->name('config');
    Route::put('/configuration/update', [ConfigurationController::class, 'update'])
        ->name('config.update');
    Route::put('/configuration/upload/{name}', [ConfigurationController::class, 'upload'])
        ->name('config.upload');

    //logout
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
    
});