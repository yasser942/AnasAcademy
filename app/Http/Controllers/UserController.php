<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles','plans')->paginate(10);
        $plans = Plan::all();

        return view('templates.users.index' , compact('users','plans'));
    }
}
