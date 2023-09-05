<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create($id)
    {
       $test=  Test::findOrFail($id);
        return view('templates/resources/tests/create-question', compact('test'));
    }
}
