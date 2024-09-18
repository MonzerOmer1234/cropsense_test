<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskReviseRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TaskWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::where('farm_group_id',auth()->user()->farm_group_id)->get();


        return view('tasks.index' , ['tasks'=> $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $workers = User::where('farm_group_id', auth()->user()->farm_group_id)
        ->where('type', 2)->get();
        return view('tasks.create',['workers'=> $workers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'status' => 'required',
            'due_date' => 'date_format:Y-m-d|after:now',
        ]);
        // return $request;

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'assigned_to_id' => $request->worker_id,
            'status'=> 1,
            'farm_group_id' => auth()->user()->farm_group_id,

        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $workers = User::where('farm_group_id', auth()->user()->farm_group_id)
        ->where('type', 2)->get();

        $task = Task::findOrFail($id);
        // Get the task revise requests
        $reviseRequests = TaskReviseRequest::where('task_id', $task->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('tasks.show' , ['task' => $task,'workers'=> $workers , 'requests'=>$reviseRequests]);
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
    public function update(Request $request, string $id)
    {
          //
          $request->validate([
            'title' => 'required',
            'description' => 'required',
            // 'status' => 'required',
            'due_date' => 'date_format:Y-m-d|after:now',
        ]);
        // return $request;

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'assigned_to_id' => $request->worker_id,
            'status'=> 1,
            'farm_group_id' => auth()->user()->farm_group_id,

        ]);

        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}
