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
    Route::resource('users', UserController::class);
    Route::get('homepage-sections', [PagesController::class, 'homepage'])->name('homepage.sections');
    Route::post('homepage-sections', [PagesController::class, 'updateHomepage'])->name('homepage.update');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
