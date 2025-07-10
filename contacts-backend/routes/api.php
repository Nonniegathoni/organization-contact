// routes/api.php
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\IndustryController;

Route::middleware('api')->group(function () {
    // Organizations
    Route::apiResource('organizations', OrganizationController::class);
    Route::patch('organizations/{organization}/toggle-status', [OrganizationController::class, 'toggleStatus']);
    
    // Contacts
    Route::apiResource('contacts', ContactController::class);
    Route::patch('contacts/{contact}/toggle-status', [ContactController::class, 'toggleStatus']);
    
    // Industries
    Route::apiResource('industries', IndustryController::class);
});