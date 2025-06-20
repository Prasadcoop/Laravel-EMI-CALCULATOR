<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TenureController;
use App\Http\Controllers\EmiRuleController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('login');
// });



Route::get('/', [CalculatorController::class, 'index'])->name('calculator.index');
Route::post('/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');

// Admin Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('tenures', TenureController::class);
    Route::resource('emi-rules', EmiRuleController::class);
});