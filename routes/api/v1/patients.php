<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\PatientController;


Route::resource('', PatientController::class)->parameter('', 'patient');


Route::post('upload_list_patients', [PatientController::class, 'upload']);