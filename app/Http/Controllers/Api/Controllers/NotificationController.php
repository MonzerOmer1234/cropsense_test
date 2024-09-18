<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // Fetch all notifications for a user
    public function index(Request $request)
    {
        // Assuming 'user_id' is passed as a query parameter or retrieved from the authenticated user
        // $userId = $request->user()->id;
        logger(Auth::id());

        // Fetch notifications for the user
        $notifications = Notification::where('user_id', Auth::id())
        ->whereMonth('created_at', Carbon::now()->startOfMonth())
        ->get();

        return response()->json(['notifications' => $notifications], 200,);

    }

    // Show a specific notification
    public function show($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            return response()->json($notification);
        } else {
            return response()->json(['error' => 'Notification not found'], 404);
        }
    }

    // Mark notification as read
    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->read_at = now();
            $notification->save();

            return response()->json(['message' => 'Notification marked as read']);
        } else {
            return response()->json(['error' => 'Notification not found'], 404);
        }
    }

    // Store a new notification (optional if mobile app can create notifications)
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title_ar' => 'required|string',
            'title_en' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
        ]);

        $notification = Notification::create($request->all());

        return response()->json($notification, 201);
    }

    // Update a notification (if necessary)
    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->update($request->all());

            return response()->json($notification);
        } else {
            return response()->json(['error' => 'Notification not found'], 404);
        }
    }

    // Delete a notification
    public function destroy($id)
    {
        $notification = Notification::find($id);

        if ($notification) {
            $notification->delete();

            return response()->json(['message' => 'Notification deleted']);
        } else {
            return response()->json(['error' => 'Notification not found'], 404);
        }
    }
}
