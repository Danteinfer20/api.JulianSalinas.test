<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaGraduateController;


Route::apiResource('area-graduates', AreaGraduateController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});