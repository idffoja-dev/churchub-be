<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

// Status check (public)
Route::get('/status', function () {
    return response()->json([
        'success' => true,
        'message' => 'OK',
        'version' => 'v1',
    ]);
})->name('status');