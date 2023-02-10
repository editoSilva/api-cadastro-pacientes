<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\UploadController;

Route::post('upload', [UploadController::class, 'upload']);