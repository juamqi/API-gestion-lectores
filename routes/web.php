<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectorController;

Route::get('/', function () {
    return view('welcome');
});

