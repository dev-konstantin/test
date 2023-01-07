<?php

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
Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
    Route::delete('/destroy/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])
        ->name('users.destroy');
});

\Illuminate\Support\Facades\Auth::routes();
