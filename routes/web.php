<?php

use App\Providers\RouteServiceProvider;
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
    return redirect(RouteServiceProvider::HOME);
});

Route::get('/dashboard', [\App\Http\Controllers\PrizeController::class, 'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::post('/get-prize', [\App\Http\Controllers\PrizeController::class, 'getPrize'])
    ->middleware(['auth'])
    ->name('get-prize');

Route::model('moneyPrize', \App\Models\MoneyPrize::class);
Route::post('/withdraw/{moneyPrize}', [\App\Http\Controllers\PrizeController::class, 'withdrawMoney'])
    ->middleware(['auth'])
    ->name('withdraw');

require __DIR__.'/auth.php';
