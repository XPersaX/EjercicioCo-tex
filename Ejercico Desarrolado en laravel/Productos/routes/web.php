<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;




Route::get('/',[ProductController::class,'index'])->name('product.index');

Route::resource('product',ProductController::class,[
    'names' =>'product',
    'parameters' => ['product' => 'product']
]);


Route::view('/register','auth/register')->name('register');
Route::post('/register',[RegisteredUserController::class,'store'])->name('register');

//Rutas para Iniciar Sesión
Route::view('/login','auth/login')->name('login');
Route::post('/login',[AuthenticatedSessionController::class,'store']);

//Rutas para cerrar Sesión
Route::post('/logout',[AuthenticatedSessionController::class,'destroy'])->name('logout');

