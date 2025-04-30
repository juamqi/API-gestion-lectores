<?php

use App\Http\Controllers\LectorController;

Route::get('/lectores', [LectorController::class, 'index']);
Route::post('/lectores', [LectorController::class, 'store']);
Route::get('/lectores/{id}', [LectorController::class, 'show']);
Route::put('/lectores/{id}', [LectorController::class, 'update']);
Route::delete('/lectores/{id}', [LectorController::class, 'destroy']);