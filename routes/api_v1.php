<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

// Health check (public)
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'OK',
        'version' => 'v1',
    ]);
})->name('health');