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
    
        $unreadNotifications = $user->unreadNotifications;
        $readNotifications = $user->readNotifications;
    
        // Marquer les notifications non lues comme lues
        $unreadNotifications->markAsRead();
    
        return view('notification.index', [
            'unreadNotifications' => $unreadNotifications,
            'readNotifications' => $readNotifications
        ]);
    }
    
}
