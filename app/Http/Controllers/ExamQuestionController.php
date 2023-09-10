<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function create($id)
    {
        $exam=  Exam::findOrFail($id);
        return view('templates/exams/create-question', compact('exam'));
    }

}
