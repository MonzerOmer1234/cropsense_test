<?php

namespace App\Http\Controllers\Sensors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sensors\Tds;
use App\Models\Sensors\Humidity;
    use App\Models\Sensors\Temperature;
    use App\Models\Sensors\Moisture;
    use App\Models\Sensors\Light;
use App\Models\Sensors\SoilMoisture;

class SensorReadingsController extends Controller
{

    function tds(Request $request)
    {
        $this->dataProcessor($request);
        // find the sensor using id , if id is empty find using serial number
        if ($request->has('sensor_id')) {
            $tds = Tds::findOrFail($request->sensor_id);
        } else {
            $tds = Tds::where('serial_number', $request->serial_number)->firstOrFail();
        }
        $reading = $tds->readings()->create([
            'read_value' => $request->read_value,
        ]);

        $tds->update(['last_read' => now()]);
        return response()->json($reading, 201);
    }




    function humidity(Request $request)
    {
        $this->dataProcessor($request);

        if ($request->has('sensor_id')) {
            $humidity = Humidity::findOrFail($request->sensor_id);
        } else {
            $humidity = Humidity::where('serial_number', $request->serial_number)->firstOrFail();
        }

        $reading = $humidity->readings()->create([
            'read_value' => $request->read_value,
        ]);

        $humidity->update(['last_read' => now()]);
        return response()->json($reading, 201);
    }

    function temperature(Request $request)
    {
        $this->dataProcessor($request);

        if ($request->has('sensor_id')) {
            $temperature = Temperature::findOrFail($request->sensor_id);
        } else {
            $temperature = Temperature::where('serial_number', $request->serial_number)->firstOrFail();
        }

        $reading = $temperature->readings()->create([
            'read_value' => $request->read_value,
        ]);

        $temperature->update(['last_read' => now()]);
        return response()->json($reading, 201);
    }

    function moisture(Request $request)
    {
        $this->dataProcessor($request);

        if ($request->has('sensor_id')) {
            $moisture = SoilMoisture::findOrFail($request->sensor_id);
        } else {
            $moisture = SoilMoisture::where('serial_number', $request->serial_number)->firstOrFail();
        }

        $reading = $moisture->readings()->create([
            'read_value' => $request->read_value,
        ]);

        $moisture->update(['last_read' => now()]);
        return response()->json($reading, 201);
    }

    function light(Request $request)
    {
        $this->dataProcessor($request);

        if ($request->has('sensor_id')) {
            $light = Light::findOrFail($request->sensor_id);
        } else {
            $light = Light::where('serial_number', $request->serial_number)->firstOrFail();
        }

        $reading = $light->readings()->create([
            'read_value' => $request->read_value,
        ]);

        $light->update(['last_read' => now()]);
        return response()->json($reading, 201);
    }



    function dataProcessor(Request $request)
    {
        $request->validate([
            'read_value' => 'required|numeric',
            'sensor_id' => 'required_without:serial_number',
            'serial_number' => 'required_without:sensor_id|string',
        ]);
    }
}
