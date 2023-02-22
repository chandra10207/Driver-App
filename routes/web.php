<?php

use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Get All Active Vehicles
Route::get('/', [ VehicleController::class, 'index' ]);

// Vehicle log count
Route::get('/vehicle/{vehicle}/log_count', [ VehicleController::class, 'logCount' ]);

// Vehicle last Info
Route::get('/vehicle/{vehicle}/last_info', [ VehicleController::class, 'lastInfo' ]);