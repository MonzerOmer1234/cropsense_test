<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\FarmWebController;
use App\Http\Controllers\HumidityController;
use App\Http\Controllers\LightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesnsorController;
use App\Http\Controllers\SoilMoistureController;
use App\Http\Controllers\TaskWebController;
use App\Http\Controllers\TdsController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\WorkerController;
use App\Models\Farm;
use App\Models\Sensor;
use App\Models\Sensors\SensorRead;
use App\Models\Sensors\Tds;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Queue\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/workers', WorkerController::class)->middleware('auth');

Route::resource('/farms', FarmWebController::class)->middleware('auth');

Route::resource('/tasks', TaskWebController::class)->middleware('auth');
Route::get('/workers/create-task', function (Worker $worker) {
    return view('workers.create_task', ['worker' => $worker]);
})->name('workers.create_task');


Route::resource('/sensors', SesnsorController::class);

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::post('/update-info', [ProfileController::class, 'updateInfo'])->name('settings.account_update');
Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('settings.account_update_password');




// DASHBOARD SCREEN ROUTES
Route::prefix('/dashboard-api')->group(function () {
    Route::get('/x', function () {
        return view('welcome');
    });
    // Route::apiResource('/farms', FarmController::class);

    Route::resource('/lights', LightController::class);
    Route::apiResource('/temperatures', TemperatureController::class);
    Route::apiResource('/humidities', HumidityController::class);
    Route::apiResource('/soilMoistures', SoilMoistureController::class);
    Route::apiResource('/tds', TdsController::class);
});



//
Route::get('single-farm-sensor-read/{farm}', function (Farm $farm) {

    $data = [
        $farm->tdsSensors()->with(['readings' => function ($q) {
            $q->whereDate('created_at', Carbon::today())->limit(10)->get();
        }])->get(),
        $farm->lightSensors()->with(['readings' => function ($q) {
            $q->whereDate('created_at', Carbon::today())->limit(10)->get();
        }])->get(),
        $farm->temepratureSensors()->with(['readings' => function ($q) {
            $q->whereDate('created_at', Carbon::today())->limit(10)->get();
        }])->get(),
        $farm->moistureSensors()->with(['readings' => function ($q) {
            $q->whereDate('created_at', Carbon::today())->limit(10)->get();
        }])->get(),
        $farm->humiditySensors()->with(['readings' => function ($q) {
            $q->whereDate('created_at', Carbon::today())->limit(10)->get();
        }])->get(),
    ];

    return response()->json($data, 200,);
});
