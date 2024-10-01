<?php

use App\Http\Controllers\ComunaController; // Make sure this line is present

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comunas', [ComunaController::class, 'index']); // Corrected class name
