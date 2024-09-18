<?php

namespace App\Http\Controllers\Sensors;

use App\Http\Controllers\Controller;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Temperature;
use Illuminate\Http\Request;

class SensorsRegistration extends Controller
{
    // new Tds sensor registration
    public function storeTds(Request $request)
    {
        $this->dataProcessor($request);
        $tds = Tds::create($request->all());
        return response()->json($tds, 201);
    }


     // new Humidity sensor registration
     public function storeHumidity(Request $request)
     {
         $this->dataProcessor($request);
         $tds = Tds::create($request->all());
         return response()->json($tds, 201);
     }

    // new Light sensor registration
    public function storeLight(Request $request)
    {
        $this->dataProcessor($request);
        $light = Light::create($request->all());
        return response()->json($light, 201);
    }

    // new SoilMoisture sensor registration
    public function storeSoilMoisture(Request $request)
    {
        $this->dataProcessor($request);
        $soilMoisture = SoilMoisture::create($request->all());
        return response()->json($soilMoisture, 201);
    }

    // new Temperature sensor registration
    public function storeTemperature(Request $request)
    {
        $this->dataProcessor($request);
        $temperature = Temperature::create($request->all());
        return response()->json($temperature, 201);
    }


    // because all sensors data is the same ,, will validate and proccess in on function , later register them
    function dataProcessor(Request $request)
    {
        $request->validate([
            'farm_id' => 'required|exists:farms,id',
            'farm_group_id' => 'required|exists:farm_groups,id',
            'type' => 'required|string',
            'type_en' => 'required|string',
            'serial_number' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'min_read' => 'required|numeric',
            'max_read' => 'required|numeric',
            'ideal_read' => 'required|numeric',
        ]);
    }
}
