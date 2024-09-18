<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Services\FarmDataService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmWebController extends Controller
{
    /**
     * Display a listing of the farms.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $farms = Farm::where('farm_group_id', Auth::user()->farm_group_id)->get();
        return view('farms.index', ['farms' => $farms]);
    }

    /**
     * Show the form for creating a new farm.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('farms.create');
    }

    /**
     * Store a newly created farm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'size' => 'required',
            'location' => 'required',
            'crop_type' => 'required',
            'description' => 'nullable',
            'points' => 'json|nullable',
        ]);

        $farm = new Farm($request->except('points'));
        $farm->farm_group_id = Auth::user()->farm_group_id;
        $farm->points = $request->points;

        $farm->save();

        return to_route('farms.show', $farm);
    }

    /**
     * Display the specified farm.
     *
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function show(string $id)
    {
        $farm = Farm::findOrFail($id);

        $farmDataService = new FarmDataService();


        $farmOperations = $farmDataService->getFarmOperations($farm);

        return view('farms.show', array_merge(
            [
                'farm' => $farm,
                'farm_operations' => $farmOperations,
                'lightReads' => $farmDataService->getLightSensorData($farm),
                'temperatureReads' => $farmDataService->getTemperatureSensorData($farm),
                'humidityReads' => $farmDataService->getHumiditySensorData($farm),
                'tdsReads' => $farmDataService->getTdsSensorData($farm),
                'soilMoistureReads' => $farmDataService->getSoilMoistureSensorData($farm),
            ],
        ));
    }

    /**
     * Show the form for editing the specified farm.
     *
     * @param  \App\Models\Farm  $farm
     * @return \Illuminate\View\View
     */
    public function edit(Farm $farm)
    {
        return view('farms.edit', ['farm' => $farm]);
    }

    /**
     * Update the specified farm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        // return $request;
        $validatedData = $request->validate([
            'name' => 'required',
            'size' => 'required',
            'location' => 'required',
            'crop_type' => 'required',
            'description' => 'nullable',
            'points' => 'json|nullable',
        ]);

        $farm = Farm::findOrFail($id);

        $farm->fill($request->except('points'));
        $farm->points = json_decode($request->points);
        $farm->points = $request->points;

        // return $farm;
        $farm->save();

        return to_route('farms.show', $farm);
    }

    /**
     * Remove the specified farm from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $farm = Farm::findOrFail($id);
        $farm->delete();
        return to_route('farms.index')->with('success', 'Farm deleted successfully');
    }
}
