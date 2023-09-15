<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Level;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $curriculums = Curriculum::all();
        $levels = Level::all();
        $units = Unit::all();


        return view('templates/main', compact( 'users',
            'curriculums', 'levels',
            'units'));
    }

}
