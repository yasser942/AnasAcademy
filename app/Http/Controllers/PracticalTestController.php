<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePracticalTestRequest;
use App\Models\Lesson;
use App\Models\PracticalTest;
use Illuminate\Http\Request;

class PracticalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $lesson = Lesson::find($id);
        return view('templates.resources.practical-tests.create',compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePracticalTestRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $practicalTest = new PracticalTest();
        $practicalTest->name = $data['name'];
        $practicalTest->description = $data['description'];
        $practicalTest->status = $data['status'];
        $practicalTest->link = $data['link'];
        $practicalTest->type = $data['type'];
        $practicalTest->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $practicalTest->save();

        if ($practicalTest){
            return redirect()->route('lesson.show',[$practicalTest->lesson_id])->with('success','تم اضافة المصدر بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $practicalTest=PracticalTest::findOrFail($id);
        return view('templates.resources.practical-tests.show',compact('practicalTest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $practicalTest=practicalTest::findOrFail($id);
        return view('templates.resources.practical-tests.edit',compact('practicalTest'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePracticalTestRequest $request, string $id)
    {
        $data=$request->validated();
        $practicalTest=PracticalTest::findOrFail($id);
        $practicalTest->name = $data['name'];
        $practicalTest->description = $data['description'];
        $practicalTest->status = $data['status'];
        $practicalTest->link = $data['link'];
        $practicalTest->type = $data['type'];
        $practicalTest->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $practicalTest->save();

        if ($practicalTest){
            return redirect()->route('lesson.show',[$practicalTest->lesson_id])->with('success','تم تعديل المصدر بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $practicalTest=PracticalTest::findOrFail($id);
        $practicalTest->delete();
        if ($practicalTest){
            return redirect()->route('lesson.show',[$practicalTest->lesson_id])->with('success','تم حذف المصدر بنجاح');
        }
    }
}
