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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resources([
    'virtual_markets' => \App\Http\Controllers\VirtualMarketController::class,
    'categories' => \App\Http\Controllers\CategoryController::class,
    'stores' => \App\Http\Controllers\StoreController::class,
    'products' => \App\Http\Controllers\ProductController::class,
    ]);
//Route::name('market.')->group(function () {
//
//    Route::get('/virtual-markets/', [App\Http\Controllers\Market\MarketController::class, 'showVirtualMarkets'])->name('virtual_markets');
//
//    Route::post('/virtual-markets/add', [App\Http\Controllers\Market\MarketController::class, 'addVirtualMarket'])->name('add_virtual_market');
//
//    Route::get('/virtual-markets/add', function(){
//        return view('market.add_virtual_market');
//    })->name('add_virtual_market_page');
//});
