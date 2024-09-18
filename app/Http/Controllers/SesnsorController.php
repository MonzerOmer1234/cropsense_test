<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Sensors\Humidity;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use Illuminate\Support\Facades\DB;
use App\Models\Sensors\Temperature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SesnsorController extends Controller
{

    function singleFarmSensors(Farm $farm)
    {
        $data = [
            'tds' => $farm->tdsSensors()->get(),
            'light' => $farm->lightSensors()->get(),
            'temeprature' => $farm->temepratureSensors()->get(),
            'moisture' => $farm->moistureSensors()->get(),
            'humidity' => $farm->humiditySensors()->get(),
        ];
        return response()->json($data, 200,);
    }
    //

    function all($id){

        logger($id);
        // Define the measurements you want to calculate averages for
        $measurements = ['temperatures', 'humidities', 'lights', 'soil_moistures', 'tds'];

        // Initialize an array to hold the results
        $averagesByDayOfWeek = [];

        // Iterate over each measurement type
        foreach ($measurements as $measurement) {
            $averagesByDayOfWeek[$measurement] = DB::table($measurement)
                ->selectRaw('DAYOFWEEK(last_read) as day_of_week,  AVG(ideal_read) as average')
                ->groupBy('day_of_week')
                ->get()
                ->mapWithKeys(function ($item) use ($measurement) {
                    $dayOfWeekNames = [
                        1 => 'Sunday',
                        2 => 'Monday',
                        3 => 'Tuesday',
                        4 => 'Wednesday',
                        5 => 'Thursday',
                        6 => 'Friday',
                        7 => 'Saturday',
                    ];

                    return [$dayOfWeekNames[$item->day_of_week] => $item->average];
                });
        }

        // Output or return the results
        return $averagesByDayOfWeek;
    }

    function tds($id)
    {
        // Retrieve the TDS records
        $tdsAverages = DB::table('tds')
        ->selectRaw('DAYOFWEEK(last_read) as day_of_week, AVG(ideal_read) as average')
        ->groupBy('day_of_week')
        ->get();

        // Transform the result to a more readable format if needed
        $averageByDayOfWeek = $tdsAverages->mapWithKeys(function ($item) {
        $dayOfWeekNames = [
            1 => 'Sunday',
            2 => 'Monday',
            3 => 'Tuesday',
            4 => 'Wednesday',
            5 => 'Thursday',
            6 => 'Friday',
            7 => 'Saturday',
        ];

        return [$dayOfWeekNames[$item->day_of_week] => $item->average];
        });

        // Output or return the results
        return response()->json($averageByDayOfWeek, 200);
        // return response()->json($tds, 200,);
    }
    function light($id)
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();
        $light = Light::find($id)
            ->readings()->selectRaw('DAYOFWEEK(created_at) as day_of_week, AVG(read_value) as average')
            ->groupBy('day_of_week')
            ->get();
        return response()->json($light, 200,);
    }
    function humidity($id)
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();
        $humidity = Humidity::find($id)
            ->readings()->selectRaw('DAYOFWEEK(created_at) as day_of_week, AVG(read_value) as average')
            ->groupBy('day_of_week')
            ->get();
        return response()->json($humidity, 200,);
    }
    function moisture($id)
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();
        $moisture = SoilMoisture::find($id)
            ->readings()->selectRaw('DAYOFWEEK(created_at) as day_of_week, AVG(read_value) as average')
            ->groupBy('day_of_week')
            ->get();
        return response()->json($moisture, 200,);
    }
    function temeprature($id)
    {
        $startOfWeek = Carbon::now()->startOfWeek()->startOfDay();
        $endOfWeek = Carbon::now()->endOfWeek()->endOfDay();
        $temeprature = Temperature::find($id)
            ->readings()->selectRaw('DAYOFWEEK(created_at) as day_of_week, AVG(read_value) as average')
            ->groupBy('day_of_week')
            ->get();
        return response()->json($temeprature, 200,);
    }
}
