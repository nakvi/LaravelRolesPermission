<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['role:super-admin|admin']],function(){


Route::get('/', function () {
    return view('welcome');
});

Route::resource('permission',App\Http\Controllers\PermissionController::class);
Route::get('permission/{id}/delete',[PermissionController::class,'destroy']);
Route::resource('role',App\Http\Controllers\RoleController::class);
Route::get('role/{id}/delete',[RoleController::class,'destroy']);
Route::get('role/{id}/give-permission',[RoleController::class,'addPermissionRole']);
Route::post('role/{id}/add-permission',[RoleController::class,'givePermissionRole']);

Route::resource('user',App\Http\Controllers\UserController::class);
Route::get('user/{id}/delete',[UserController::class,'destroy']);
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

