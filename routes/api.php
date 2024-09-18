<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\SensorReadController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmOperationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SesnsorController;
use App\Http\Controllers\SesnsorControllerLive;
use App\Models\FarmOperation;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/auth')->group(function () {
    // Registeration of user
    Route::post('/register', [AuthController::class, 'register']);
    // login of the user
    Route::post('/login', [AuthController::class, 'login']);
    // Logout of the user
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    // forgot and reset passwords:
    Route::post('password/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
    Route::post('password/reset', [ResetPasswordController::class, 'passwordReset']);
});


// Sensor Readings Routes:
//
// 1. Store a single sensor reading
Route::post('/sensor-read/store', [SensorReadController::class, 'store']);
// 2. Display all readings of a specified sensor
Route::get('/sensor-read/{sensor_id}', [SensorReadController::class, 'index']);
Route::post('/sensors-read/read-sensor-data', [SensorReadController::class, 'readSensorDataById']);


/**
 * // => "api/farms/" returns farms related to worker farm group
 * // => "api/farms/{farmID}" returns single farm without sensors Data
 * // => "farms/read-single-farm/{farmID}" returns farm sensors today
 */
Route::apiResource('/farms', FarmController::class)->middleware('auth:sanctum');
/**
   EDITED FUNCTION'S NAME AND INSIDE IT
 */
Route::get('/farms/read-single-farm/{farm}', [SesnsorController::class, 'singleFarmSensors'])->name('singleFarmReading');


/// will get the average in week for specific Sensorby id
Route::prefix('/sensors/average')->group(function () {
    Route::get('/tds/{id}', [SesnsorController::class, 'tds'])->name('tds');
    Route::get('/light/{id}', [SesnsorController::class, 'light'])->name('light');
    Route::get('/humidity/{id}', [SesnsorController::class, 'humidity'])->name('humidity');
    Route::get('/moisture/{id}', [SesnsorController::class, 'moisture'])->name('moisture');
    Route::get('/temeprature/{id}', [SesnsorController::class, 'temeprature'])->name('temeprature');

    /**
       REAPLACED THE ABOVE APIs WITH THIS ONE:
     */
    Route::get('/all/{id}', [SesnsorController::class, 'all'])->name('all');
});

// will get live for specific Sensor by id
// limit is optional
/**
 * LIMIT IS NUMERICAL > WILL RETURN ZERO RESULT IF STRING PASSED
 */
Route::prefix('/sensors/live')->group(function () {
    Route::get('/tds/{id}/{limit?}', [SesnsorControllerLive::class, 'tds'])->name('tds');
    Route::get('/light/{id}/{limit?}', [SesnsorControllerLive::class, 'light'])->name('light');
    Route::get('/humidity/{id}/{limit?}', [SesnsorControllerLive::class, 'humidity'])->name('humidity');
    Route::get('/moisture/{id}/{limit?}', [SesnsorControllerLive::class, 'moisture'])->name('moisture');
    Route::get('/temeprature/{id}/{limit?}', [SesnsorControllerLive::class, 'temeprature'])->name('temeprature');
});


Route::prefix('/tasks')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [TaskController::class, 'index']);
    /**
       ADDED THIS API (STORE), NEEDS SOME FIXES
       => NOT WORKING DUE TO NULL ISSUES
     */
    Route::post('/', [TaskController::class, 'store']);
    Route::post('/update-status/{task}', [TaskController::class, 'updateStatus']);
    /**
       WASN'T ABLE TO USE PROPERLY
     */
    Route::post('/revisoin-request', [TaskController::class, 'sendRevisionRequest']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/operations/history', [FarmOperationController::class, 'index'])->name('operations.index');
    Route::post('/operations', [FarmOperationController::class, 'store'])->name('operations.store');
    Route::put('/operations/{operation}', [FarmOperationController::class, 'update'])->name('operations.update');

    // Notifcaion Route
    Route::get('/notifications/history', [NotificationController::class, 'index'])->name('operations.index');
});


Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/update-profile', [AuthController::class, 'updateProfile']);
    Route::post('/user-password', [AuthController::class, 'updatePassword'])->middleware('auth:sanctum');
});



require __DIR__ . '/sensors_input.php';






/**
 NOT USABLE FOR NOW
 */

// Sensor Route

// Route::apiResource('/sensors' , SensorController::class);

// Route::post('/sensor-readings/read-sensor-data' , [SensorReadingsController::class , 'readSensorDataById']);


/**
 *AdminUser Api routes disabled
 *Admin will work on dashboard
 */
// Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

//     /// Tasks Managent

//     Route::prefix('tasks')->group(function () {
//         Route::get('/unassigned-tasks', [TaskController::class, 'unassignedTasks']);

//     });


//     ///  Workers Managment
//     Route::prefix('workers')->group(function () {
//         Route::post('', [WorkerController::class, 'store']);
//         Route::delete('/{userId}', [WorkerController::class, 'deactivateUser']); // Using DELETE for deactivation
//         Route::delete('/{userId}/force', [WorkerController::class, 'deleteUser']); // Force delete
//     });
// });

// change
// Farm routes
//  1. to store a farm


// include sensors_input.php





/// Farmer routes
/**
    show farms
    show single farm details
        - include sensors
        - each sensor data
    show tasks
    single task
        - show details
        - update task
    show farm operations
        - make new farm operation
 */
