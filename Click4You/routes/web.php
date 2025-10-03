<?php

use Illuminate\Support\Facades\Route;


// ================ RUTAS PÚBLICAS ================
Route::get('/', function () {
    return view('app');
})->name('app');

Route::get('/sign-up', function(){
    return view('sign-up');
})->name('sign-up'); // Darle un nombre nos ayudará a usar URLs dinámicas

Route::get('/sign-in', function(){
    return view('sign-in'); 
})->name('sign-in');


// ================ RUTAS AUTENTICACIÓN ================
Route::middleware('auth:sanctum')->group(function (){
    Route::get('/profile', function(){
        return view('user.profile');
    })->name('profile');

    Route::get('/gh', function(){
        return view('');
    })->name('settings');

    Route::get('/gf', function(){
        return view('');
    })->name('logout');
})


?>