<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $farms = Farm::where('farm_group_id', Auth::user()->farm_group_id)->get();
        $tasks = Task::where('farm_group_id', Auth::user()->farm_group_id)->whereIn('status', [1, 2, 4])->count();
        $workers = User::where('farm_group_id',Auth::user()->farm_group_id)->where('type',2)->get();
        // return $farms;
        return view('newhome', compact(
            'farms',
            'tasks',
            'workers'
        ));
    }
}
