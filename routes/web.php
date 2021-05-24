<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/social-auth/{provider}', [\App\Http\Controllers\Auth\SocialController::class, 'redirectToProvider'])->name('auth.social');

Route::get('/social-auth/{provider}/callback', [\App\Http\Controllers\Auth\SocialController::class, 'handleProviderCallback'])->name('auth.social.callback');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');