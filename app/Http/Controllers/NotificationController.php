<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        $user = User::find(1);
        $notification = $user->unreadNotifications->find($id)->update(['read_at' => now()]);
        return redirect()->back();
    }
}
