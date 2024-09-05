<?php

use App\Http\Controllers\Api\SupportController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/supports', SupportController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
