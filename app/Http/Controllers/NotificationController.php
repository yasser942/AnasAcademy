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


    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
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

        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAA30uP5u0:APA91bEsikVdaD3lLE_Zz3RI8aQNRGI9C40wf_b_P1dftHNg0dd5J3IEcndBvQj9gSIb_7OHsEnWsiKjYgyshMcG-qA03Na3ZMaqHHM-iLUKm8K26OBvhaFgId8RsfOkHMmQOQ_rFlEh';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" =>$data['subject'],
                "body" => $data['message'],
                "icon" => 'https://firebasestorage.googleapis.com/v0/b/fir-course-8efbd.appspot.com/o/1024.png?alt=media&token=f54e725a-b2f3-4c1c-ac43-8dca641528fa&_gl=1*15xcvdv*_ga*MTc5ODY5NDMwMi4xNjc5ODIzNjE1*_ga_CW55HF8NVT*MTY5NTkwMTY0NS4yNjAuMS4xNjk1OTAyMjE3LjM1LjAuMA..',
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);


        return redirect()->route('notification.index')->with('success', 'تم ارسال الاشعار بنجاح');
    }

}
