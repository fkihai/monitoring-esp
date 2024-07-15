<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;

Route::get('/', [MonitoringController::class, 'monitoring'])->name('monitoring');
Route::get('/realtime', [MonitoringController::class, 'realtime'])->name('realtime');
