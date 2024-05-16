<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __invoke()
    {
        $notifications = auth()->user()->unreadNotifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index', [
            'notifications' => $notifications
        ]);
    }
}
