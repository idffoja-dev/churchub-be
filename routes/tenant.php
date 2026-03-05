<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::middleware([
    'api',
    InitializeTenancyBySubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::prefix('api/v1')->group(function () {

        Route::get('/health', function () {
            return response()->json([
                'success' => true,
                'message' => 'OK',
                'tenant'  => tenant('id'),
            ]);
        });

    });
});
