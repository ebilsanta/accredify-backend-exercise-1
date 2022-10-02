<?php

use App\HTTP\Controllers\PatientsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/patients', [PatientsApiController::class, 'index']);

Route::post('/patients', [PatientsApiController::class, 'store']);

Route::delete('/patients/{patientNric}', [PatientsApiController::class, 'destroy']);