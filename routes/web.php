<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;

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
    return view('index');
});

Route::controller(UserController::class)->group(function () {
    Route::get('user', 'index');
    Route::post('user/assign', 'assign');
    Route::get('user/new', 'new');
    Route::post('user/create', 'create');
});

Route::controller(DepartmentController::class)->group(function () {
    Route::get('department', 'index');
    Route::get('department/new', 'new');
    Route::post('department/create', 'create');
    Route::post('department/delete', 'delete');
});
