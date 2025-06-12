<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\admin\EventController;

// Admin routes for managing events


Route::prefix('v1/admin')->middleware(['auth:sanctum', 'role:admin|supervisor'])->group(function () {
    Route::apiResource('events', EventController::class)->names('admin.events');

    Route::patch('events/{event}/status', [EventController::class, 'approve'])
        ->middleware('permission:approve_event');
});
