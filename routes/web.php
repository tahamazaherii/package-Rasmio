<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RasmioController;

Route::get('/', function () {
    return view('welcome');
});




Route::prefix('rasmio/getInfo')->group(function () {
    Route::get('/company', [RasmioController::class, 'companyInfo']);
    Route::get('/companyNews', [RasmioController::class, 'companyNewsInfo']);
});


