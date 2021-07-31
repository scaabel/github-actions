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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/roles-count', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::get('/testing', [\App\Http\Controllers\TestController::class, 'index'])->name('test.index');
