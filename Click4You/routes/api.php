<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Agregamos directorios del proyecto
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// ========== RUTAS PÚBLICAS ==========
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    Route::put('/update-user/{id}', [UserController::class, 'update']);
});

?>