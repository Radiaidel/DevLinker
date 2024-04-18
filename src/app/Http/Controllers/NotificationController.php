<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        // Récupérer les notifications associées à l'utilisateur authentifié
        $notifications = Notification::where('notifiable_id', $user->id)->with('user')->get();
            // dd($notifications);
        return view('notification.index', compact('notifications'));
    }
}
