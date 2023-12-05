<?php

use App\Http\Controllers\AuthManager;
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

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get('/login', [\App\Http\Controllers\AuthManager::class, "login"])->name("login");
Route::post("/login",[\App\Http\Controllers\AuthManager::class, "userLogin"])->name("user.login");
Route::post("/signup",[\App\Http\Controllers\AuthManager::class, "userSignup"])->name("user.signup");
Route::get('/signup', [\App\Http\Controllers\AuthManager::class, "signup"])->name("signup");
Route::get('/logout', [\App\Http\Controllers\AuthManager::class, "logout"])->name("logout");
