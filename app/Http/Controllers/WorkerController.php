<?php

namespace App\Http\Controllers;

use App\Models\FarmOperation;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $workers = User::where('farm_group_id', Auth::user()->farm_group_id)
            ->where('type', 2)->get();
        return view('workers.index', ['workers' => $workers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('workers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',

        ]);

        $worker = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'type' => 2,
            'farm_group_id' => Auth::user()->farm_group_id,
        ]);
        return redirect()->route('workers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $worker = User::findOrFail($id);
        // worker farm operations , paginated
        $farmOperations = FarmOperation::where('worker_id', $worker->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('workers.show', ['worker' => $worker, 'operations'=> $farmOperations]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $worker)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$worker->id,
            'phone' => 'required',
            // 'password' => 'min:6',
        ]);

        // if($request->password){

        // }
        $worker->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
