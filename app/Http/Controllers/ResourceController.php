<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateResourceRequest;
use App\Models\Lesson;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
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
        $lesson=  Lesson::findOrFail($id);
        return view('templates/resources/create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateResourceRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $resource = new Resource();
        $resource->name = $data['name'];
        $resource->description = $data['description'];
        $resource->status = $data['status'];
        $resource->type = $data['type'];
        $resource->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $resource->save();

        if ($resource){
            return redirect()->route('lesson.show',[$resource->lesson_id])->with('success','تم اضافة المصدر بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $resource = Resource::findOrFail($id);
        return view('templates/resources/edit',compact('resource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateResourceRequest $request, string $id)
    {

        $data=$request->validated();
        $resource = Resource::findOrFail($id);
        $resource->name = $data['name'];
        $resource->description = $data['description'];
        $resource->status = $data['status'];
        $resource->type = $data['type'];
        $resource->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $resource->save();

        if ($resource){
            return redirect()->route('lesson.show',[$resource->lesson_id])->with('success','تم تعديل المصدر بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();
        return redirect()->route('lesson.show',[$resource->lesson_id])->with('success','تم حذف المصدر بنجاح');
    }
}
