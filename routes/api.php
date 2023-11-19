<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

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

Route::group(['prefix' => 'v1', 'before' => 'v1'], function () {
    Route::get('homepage', [HomeController::class, 'homepage']);
    Route::get('menus', [HomeController::class, 'menus']);
    Route::get('services', [HomeController::class, 'services']);
    Route::get('solutions', [HomeController::class, 'solutions']);
    Route::get('categories-and-clients', [HomeController::class, 'categoriesAndClients']);
    Route::get('partners', [HomeController::class, 'partners']);
    Route::get('why-braghtech', [HomeController::class, 'whyBraghtech']);
    Route::get('company-settings', [HomeController::class, 'companySettings']);
    Route::post('contact-form', [HomeController::class, 'contactForm']);
});