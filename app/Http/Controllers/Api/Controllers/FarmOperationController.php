<?php

namespace App\Http\Controllers;

use App\Models\FarmOperation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmOperationController extends Controller
{



    function index(Request $request)
    {
        // $opeations = FarmOperation::where('worker_id', Auth::id())
        logger($request->farm_id);
        $opeations = FarmOperation::where('farm_id', $request->farm_id)
            ->whereMonth('created_at', Carbon::now()->startOfMonth())
            ->get();
        logger($opeations);
        return response()->json(['operations' => $opeations], 200,);
    }

    function store(Request $request)
    {
        logger($request);

        // return $request ;
        $request->validate([
            'farm_id' => 'required',
            'area' => 'required',
            'type' => 'required|in:fertilizer,pesticide,irrigation',
            'quantity' => 'required',
        ]);
        $newOperation =  FarmOperation::create([
            'area' => $request->area,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'worker_id' => Auth::id(),
            'farm_id' => $request->farm_id
        ]);
        return response()->json(['operation' => $newOperation], 200,);
    }

    function update(Request $request, FarmOperation $operation)
    {
        $request->validate([
            'farm_id' => 'required',
            'area' => 'required',
            'type' => 'required|in:fertilizer,pesticide,irrigation'
        ]);
        $newOperation =  $operation->update([
            'area' => $request->area,
            'quantity' => $request->quantity,
            'type' => $request->type,
            'worker_id' => Auth::id(),
            'farm_id' => $request->farm_id
        ]);
        return response()->json(['operation' => $newOperation], 200,);
    }
}
