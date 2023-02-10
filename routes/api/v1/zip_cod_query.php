<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\ZipCodeQueryController;

Route::get('/{cod}', [ZipCodeQueryController::class, 'show']);