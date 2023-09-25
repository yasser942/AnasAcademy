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






        return view('templates/main', compact( 'chart1','users',
            'curriculums', 'levels','remainingTime',
            'exams', 'units'));
    }

}
