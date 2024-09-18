<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // get the farms belongs to farm_group
        // return Auth::user()->workerFarmGroup->id;
        // return
        $farms = Farm::where('farm_group_id', Auth::user()->workerFarmGroup->id)->get();
        return response()->json([
            'status' => 'success',
            'message' => 'All farms are fetched successfully',
            'farms' => $farms,
        ]);
    }


    /**
     * Display the specified resource.
     * @param string $id.
     * @return Response
     */
    public function show(Farm $farm)
    {
        // get farm without sensors
        return response()->json([
            'message' => 'The specified farm is fetched successfully',
            'farm' => $farm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Illuminate\Http\Request $request.
     * @param string $id
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        $fields =  $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'crop_type' => 'required',
            'description' => 'required',
            'farm_group_id' => 'required'
        ]);

        $farm->update($fields);

        return response()->json([
            'message' => 'The farm is updated successfully',
            'farm' => $farm,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id.
     * @return Response
     */
    public function destroy(string $id)
    {
        //
        $farm = Farm::findOrFail($id);
        $farm->delete();
        return response()->json([
            'message' => 'The farm is deleted successfully',
        ]);
    }
}
