<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePracticalExamRequest;
use App\Models\PracticalExam;
use Illuminate\Http\Request;

class PracticalExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.exams.practical-exams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePracticalExamRequest $request)
    {
        $practiceExam =PracticalExam::create($request->validated());
        return redirect()->route('exam.index')->with('success', 'تم إضافة الإمتحان العملي بنجاح');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = PracticalExam::findOrFail($id);
        return view('templates.exams.practical-exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $exam = PracticalExam::findOrFail($id);
        return view('templates.exams.practical-exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePracticalExamRequest $request, string $id)
    {

        $exam = PracticalExam::findOrFail($id);
        $exam->update($request->validated());
        return redirect()->route('exam.index')->with('success', 'تم تعديل الإمتحان العملي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $exam = PracticalExam::findOrFail($id);
            $exam->delete();
            return redirect()->route('exam.index')->with('success', 'تم حذف الإمتحان العملي بنجاح');
        } catch (\Exception $e) {

            return redirect()->route('exam.index')->with('error', 'حدث خطأ أثناء حذف الإمتحان العملي');
        }
    }
}
