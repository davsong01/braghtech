<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomepageSections;
use App\Http\Controllers\GeneralSettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::resource('users', UserController::class);
Route::resource('menu', MenuController::class);
Route::get('general-settings', [GeneralSettingController::class, 'index'])->name('general-settings');
Route::post('general-settings', [GeneralSettingController::class, 'store'])->name('general-settings.update');
Route::get('homepage-sections', [PagesController::class, 'homepage'])->name('homepage.sections');
Route::post('homepage-sections', [PagesController::class, 'updateHomepage'])->name('homepage.update');
