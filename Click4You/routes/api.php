<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Agregamos directorios del proyecto
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// ========== RUTAS PÚBLICAS ==========
Route::post('/sign-in', [AuthController::class, 'login']);
Route::post('/sign-up', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    Route::put('/update-user/{id}', [UserController::class, 'update']);
});

?>