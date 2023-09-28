<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Plan;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminDashboardController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index()
    {
        $users = User::all();
        $curriculums = Curriculum::all();
        $levels = Level::all();
        $units = Unit::all();
        $exams = Exam::all();
        $user = User::findOrFail(auth()->user()->id);
        $remainingTime = $user->remainingTime();



        $chart_options = [
            'chart_title' => 'المستخدمين الجدد',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

            $chart1 = new LaravelChart($chart_options);



        $plans = Plan::all();

        $planCounts = [];

        foreach ($plans as $plan) {
            $planCounts[$plan->name] = $plan->countActiveUsers();
        }


        return view('templates.main-member', compact( 'chart1','users',
            'curriculums', 'levels','remainingTime',
            'exams', 'units','planCounts'));
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
    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAA30uP5u0:APA91bEsikVdaD3lLE_Zz3RI8aQNRGI9C40wf_b_P1dftHNg0dd5J3IEcndBvQj9gSIb_7OHsEnWsiKjYgyshMcG-qA03Na3ZMaqHHM-iLUKm8K26OBvhaFgId8RsfOkHMmQOQ_rFlEh';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
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

        dd($response);
    }

}
