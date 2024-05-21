<?php

use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\SuperAdmin\PermissionsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\UserController;



//Rutas para Iniciar Sesión
Route::view('/','auth/login')->name('login.index');
Route::post('/login',[AuthenticatedSessionController::class,'store'])->name('login.store');

//Rutas para cerrar Sesión
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');


Route::view('/register','auth/register')->name('register');
Route::post('/register',[RegisteredUserController::class,'store'])->name('register');

Route::resource('product',ProductController::class,[
    'names' =>'product',
    'parameters' => ['product' => 'product']
]);


// Rutas para el SuperAdmin
Route::resource('users',UserController::class)->names('superadmin.users');


//Rutas para los roles
Route::resource('roles',RoleController::class)->names('superadmin.roles');

//Rutas para los Permisos
Route::resource('permissions',PermissionsController::class)->names('superadmin.permissions');


