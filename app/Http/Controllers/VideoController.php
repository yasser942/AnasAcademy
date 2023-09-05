<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVideoRequest;
use App\Models\Lesson;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $lesson = Lesson::find($id);
        return view('templates/resources/videos/create', compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateVideoRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $video = new Video();
        $video->name = $data['name'];
        $video->description = $data['description'];
        $video->status = $data['status'];
        $video->link = $data['link'];
        $video->type = $data['type'];
        $video->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $video->save();

        if ($video){
            return redirect()->route('lesson.show',[$video->lesson_id])->with('success','تم اضافة المصدر بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $video=Video::findOrFail($id);
        return view('templates/resources/videos/show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $video=Video::findOrFail($id);
          return view('templates/resources/videos/edit',compact('video'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateVideoRequest $request, string $id)
    {

        $data=$request->validated();
        $video=Video::findOrFail($id);
        $video->name = $data['name'];
        $video->description = $data['description'];
        $video->status = $data['status'];
        $video->link = $data['link'];
        $video->type = $data['type'];
        $video->lesson_id = $data['lesson_id'];
        $video->save();
        if ($video){
            return redirect()->route('lesson.show',[$video->lesson_id])->with('success','تم تعديل المصدر بنجاح');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $video=Video::findOrFail($id);
            $video->delete();
            return redirect()->route('lesson.show',[$video->lesson_id])->with('success','تم حذف المصدر بنجاح');
        }
        catch (\Exception $e){
            return redirect()->route('lesson.show',[$video->lesson_id])->with('error','لم يتم حذف المصدر');
        }
    }
}
