<?php

namespace App\Services;

use App\Models\Farm;
use App\Models\SensorData;
use App\Models\FarmOperation;

class FarmDataService
{


    public function getFarmOperations(Farm $farm)
    {

        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $farmOperations = $farm->farmOperations()
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('created_at', 'asc')
            ->get();

        return $farmOperations;
    }



    // humiditysensor
    public function getHumiditySensorData(Farm $farm)
    {
        // humidity sensor reads
        $humiditySensor = $farm->humiditySensors()->latest()->first();
        $humidityReads = $humiditySensor === null ? [] :  $humiditySensor->readings()->select("read_value")->get();
        $humidityData = [];
        foreach ($humidityReads as $read) {
            array_push($humidityData, +$read->read);
        }

        $humidityReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'data' => $humidityData,
        ];

        return $humidityReads;
    }



    // soil moisture sensor
    public function getSoilMoistureSensorData(Farm $farm)
    {
        // soli moisture sensor reads
        $soilMoistureSensor = $farm->moistureSensors()->latest()->first();
        $soilMoistureReads = $soilMoistureSensor === null ? [] :  $soilMoistureSensor->readings()->select("read_value")->get();
        $soilMoistureData = [];
        foreach ($soilMoistureReads as $read) {
            array_push($soilMoistureData, +$read->read);
        }

        $soilMoistureReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'data' => $soilMoistureData,
        ];

        return $soilMoistureReads;
    }

    //  temperature sensor
    public function getTemperatureSensorData(Farm $farm)
    {
        // temperature sensor reads
        $temperatureSensor = $farm->temepratureSensors()->latest()->first();
        $temperatureReads = $temperatureSensor === null ? [] :  $temperatureSensor->readings()->select("read_value")->get();
        $temperatureData = [];
        foreach ($temperatureReads as $read) {
            array_push($temperatureData, +$read->read);
        }

        $temperatureReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'data' => $temperatureData,
        ];

        return $temperatureReads;
    }

    // light sensor
    public function getLightSensorData(Farm $farm)
    {
        $lightSensor = $farm->lightSensors()->latest()->first();
        $lightReads = $lightSensor === null ? [] :  $lightSensor->readings()->select("read_value")->get();
        $lightData = [];
        foreach ($lightReads as $read) {
            array_push($lightData, +$read->read);
        }

        $lightReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'data' => $lightData,
        ];

        return $lightReads;
    }

    // tds sensor
    public function getTdsSensorData(Farm $farm)
    {
        $tdsSensor = $farm->tdsSensors()->latest()->first();
        $tdsReads = $tdsSensor === null ? [] :  $tdsSensor->readings()->select("read_value")->get();
        $tdsData = [];
        foreach ($tdsReads as $read) {
            array_push($tdsData, +$read->read);
        }

        $tdsReads = [
            'labels' => ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'data' => $tdsData,
        ];

        return $tdsReads;
    }
}
