<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Sensors\Humidity;
use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Temperature;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SesnsorControllerLive extends Controller
{

    function tds($id , $limit = null)
    {
        $tds = Tds::find($id)
            ->readings()
            ->latest()->limit($limit)
            ->get();
        return response()->json($tds, 200,);
    }
    function light($id , $limit = null)
    {
        $light = Light::find($id)
            ->readings()
            ->latest()->limit($limit)
            ->get();
        return response()->json($light, 200,);
    }
    function humidity($id , $limit = null)
    {
        $humidity = Humidity::find($id)
            ->readings()
            ->latest()->limit($limit)
            ->get();
        return response()->json($humidity, 200,);
    }
    function moisture($id , $limit = null)
    {
        $moisture = SoilMoisture::find($id)
            ->readings()
            ->latest()->limit($limit)
            ->get();
        return response()->json($moisture, 200,);
    }
    function temeprature($id , $limit = null)
    {
        $temeprature = Temperature::find($id)
            ->readings()
            ->latest()->limit($limit)
            ->get();
        return response()->json($temeprature, 200,);
    }



    //====================== NOT USED CODE FOR NOW ==========================//
}
