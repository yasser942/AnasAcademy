<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PushedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->latest()->paginate(10);


        return view('templates.notifications.index', compact('notifications'));
    }
     public function create()
     {
         return view('templates.notifications.create');
     }
     public function show($id) {
            $notification = auth()->user()->notifications()->find($id);
            self::markAsRead($id);
            return view('templates.notifications.show', compact('notification'));
     }

     public  function destroy($id)
     {
         $notification = auth()->user()->notifications()->find($id);
         if ($notification) {
             $notification->delete();
         }
         return redirect()->back()->with('success', 'تم حذف الاشعار بنجاح');
     }
    public function destroyAll()
    {
        $notifications = auth()->user()->notifications()->get();
        if ($notifications) {
            foreach ($notifications as $notification) {
                $notification->delete();
            }
        }
        return redirect()->back()->with('success', 'تم حذف الاشعارات بنجاح');

    }




    public function markAllAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }


    public function markAsRead($notificationId)
    {
        $notification = auth()->user()->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'sender' => 'required',
        ]);

        Notification::send(User::all(), new PushedNotification($data['subject'], $data['message'], $data['sender']));



        return redirect()->route('notification.index')->with('success', 'تم ارسال الاشعار بنجاح');
    }

}
