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

Auth::routes();

Route::match( ['get','post'] ,'/home' ,[App\Http\Controllers\HomeController::class, 'index'])->name('home');





//Admin Route
Route::get('admin/home', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('login.admin');
Route::post('admin', 'Admin\LoginController@login');
Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('admin/add', [App\Http\Controllers\AdminController::class, 'add']);

