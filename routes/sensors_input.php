<?php

use App\Http\Controllers\Sensors\SensorReadingsController;
use App\Http\Controllers\Sensors\SensorsRegistration;
use App\Models\Sensors\Tds;
use Illuminate\Support\Facades\Route;


Route::prefix('/sensors-inputs')->group(function () {

    Route::prefix('/registration')->group(function () {

        Route::post('tds', [SensorsRegistration::class, 'storeTDS'])->name('tds');
        Route::post('humidity', [SensorsRegistration::class, 'storeHumidity'])->name('humidity');
        Route::post('light', [SensorsRegistration::class, 'storeLight'])->name('light');
        Route::post('soil-moisture', [SensorsRegistration::class, 'storeSoilMoisture'])->name('soil-moisture');
        Route::post('temperature', [SensorsRegistration::class, 'storeTemperature'])->name('temperature');
    });

    //
    Route::prefix('/register-sensor-readings')->group(function () {
        // use SensorReadingsController
        Route::post('/tds', [SensorReadingsController::class, 'tds'])->name('tds');
        Route::post('/humidity', [SensorReadingsController::class, 'humidity'])->name('humidity');
        Route::post('/light', [SensorReadingsController::class, 'light'])->name('light');
        Route::post('/soil-moisture', [SensorReadingsController::class, 'soil-moisture'])->name('soil-moisture');
        Route::post('/temperature', [SensorReadingsController::class, 'temperature'])->name('temperature');
    });


    // Route to test first TDS sensor and its last reading
    Route::get('/test-tds', function () {
        $firstTdsSensor = Tds::first();
        if (!$firstTdsSensor) {
            return response()->json(['error' => 'No TDS sensor found'], 404);
        }

        $lastReading = $firstTdsSensor->readings()->latest()->first();

        if (!$lastReading) {
            return response()->json(['error' => 'No readings found for this TDS sensor'], 404);
        }

        return response()->json([
            'sensor_id' => $firstTdsSensor->id,
            'last_reading' => $lastReading->read_value,
            'time' => $lastReading->created_at,
            'my_time'=> $firstTdsSensor->last_read
        ]);
    })->name('test-tds');
});
