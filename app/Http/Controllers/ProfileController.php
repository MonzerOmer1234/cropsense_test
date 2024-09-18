<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;



class ProfileController extends Controller
{

    function updateInfo(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,email,' . Auth::id(),
            'phone' => 'required|unique:users,phone,' . Auth::id(),
        ]);
        Auth::user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('settings')->with('msg', 'success');
    }
    function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:5',
            'old_password' => 'required',
        ]);
        // Check Hash Compare
        if (Hash::check($request->old_password, Auth::user()->password)) {
            Auth::user()->update([
                'password' => $request->password,
            ]);
            return redirect()->route('settings')->with('pass_msg', 'success');
        }
        else {
            return redirect()->route('settings')->with('pass_msg', 'error');

        }
    }
}
