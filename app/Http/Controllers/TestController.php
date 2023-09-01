<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestRequest;
use App\Models\Lesson;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
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
    public function create($id)
    {

        $lesson=  Lesson::findOrFail($id);
        return view('templates/resources/tests/create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTestRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $test = new Test();
        $test->name = $data['name'];
        $test->description = $data['description'];
        $test->status = $data['status'];
        $test->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $test->save();

        if ($test){
            return redirect()->route('lesson.show',[$test->lesson_id])->with('success','تم اضافة الاختبار بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test =Test::with('questions')->findOrFail($id);
        $questions = $test->questions;

        return view('templates/resources/tests/show',compact('test','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test =Test::findOrFail($id);

        return view('templates/resources/tests/edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateTestRequest $request, string $id)
    {
        $data=$request->validated();
        $test = Test::findOrFail($id);
        $test->name = $data['name'];
        $test->description = $data['description'];
        $test->status = $data['status'];
        $test->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $test->save();

        if ($test){
            return redirect()->route('lesson.show',[$test->lesson_id])->with('success','تم تعديل الاختبار بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $test = Test::findOrFail($id);
        $test->delete();
        if ($test){
            return redirect()->route('lesson.show',[$test->lesson_id])->with('success','تم حذف الاختبار بنجاح');
        }
    }
}
