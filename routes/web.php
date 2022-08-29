<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// general access
Route::get('/', function () {
    return view('resorts.index');
});

// guest access
Route::get('/login/admin', [UserController::class, 'login'])->middleware('guest');
Route::post('/login/admin/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// admin access
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/admin-panel', [UserController::class, 'adminPanel'])->middleware('auth');
Route::get('/admins', [UserController::class, 'index'])->middleware('auth');
Route::get('/admins/create', [UserController::class, 'create'])->middleware('auth');
Route::post('/admins/store', [UserController::class, 'store'])->middleware('auth');
Route::get('/admins/{admin}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::put('/admins/{admin}', [UserController::class, 'update'])->middleware('auth');
Route::delete('/admins/{admin}', [UserController::class, 'destroy'])->middleware('auth');