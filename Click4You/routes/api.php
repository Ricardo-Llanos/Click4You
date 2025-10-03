<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Agregamos directorios del proyecto
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// ========== RUTAS PÚBLICAS ==========
Route::post('/sign-in', [AuthController::class, 'login']);
Route::post('/sign-up', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function(Request $request){
        return $request->user();
    });

    // --- User ---
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    Route::put('/update-user/{id}', [UserController::class, 'update']);
    Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);

    Route::post('/sign-out', [AuthController::class, 'sign-out']);

    // --- Product ---
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/product/{id}', [ProductController::class, 'show']);
    Route::post('/insert-product', [ProductController::class, 'store']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
});

?>