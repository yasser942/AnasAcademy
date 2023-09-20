<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExamRequest;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::paginate(10);
        return view('templates.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExamRequest $request)
    {
        $exam = Exam::create($request->validated());
        return redirect()->route('exam.index')->with('success', 'تم إضافة الإمتحان بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::findOrFail($id);
        return view('templates.exams.show', compact('exam'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = Exam::findOrFail($id);
        return view('templates.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateExamRequest $request, string $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->update($request->validated());
        return redirect()->route('exam.index')->with('success', 'تم تعديل الإمتحان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $exam = Exam::findOrFail($id);
            $exam->delete();
            return redirect()->route('exam.index')->with('success', 'تم حذف الإمتحان بنجاح');
        }
        catch (\Exception $e) {
            return redirect()->route('exam.index')->with('error', 'حدث خطأ أثناء حذف الإمتحان');
        }
    }
}
