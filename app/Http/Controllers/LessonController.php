<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLessonRequest;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Models\Lesson;

class LessonController extends Controller
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
        $unit=  Unit::findOrFail($id);
        return view('templates/lessons/create', compact('unit'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLessonRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $lesson = new Lesson();
        $lesson->name = $data['name'];
        $lesson->description = $data['description'];
        $lesson->status = $data['status'];
        $lesson->unit_id = $data['unit_id'];

        // Save the new Unit record
        $lesson->save();

        if ($lesson){
            return redirect()->route('unit.show',[$lesson->unit_id])->with('success','تم اضافة الدرس بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson =Lesson::with('pdfs','tests','videos','practicalTests')->findOrFail($id);

        return view('templates/lessons/show',compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $lesson = Lesson::findOrFail($id);
        return view('templates/lessons/edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateLessonRequest $request, string $id)
    {
        $data=$request->validated();
        $lesson = Lesson::findOrFail($id);
        $lesson->name = $data['name'];
        $lesson->description = $data['description'];
        $lesson->status = $data['status'];
        $lesson->unit_id = $data['unit_id'];

        // Save the new Unit record
        $lesson->save();

        if ($lesson){
            return redirect()->route('unit.show',[$lesson->unit_id])->with('success','تم تعديل الدرس بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return redirect()->route('unit.show',[$lesson->unit_id])->with('success','تم حذف الدرس بنجاح');
    }
}
