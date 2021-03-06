<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensesController;
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



Route::prefix('/')->middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/', [ExpensesController::class, 'redirect'])->name('main.redirect');
    
    Route::resource('despesas', ExpensesController::class);

});


