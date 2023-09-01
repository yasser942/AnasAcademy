<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurriculumRequest;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $curriculums= curriculum::latest()->get();
        return view('templates/curriculums/index',compact('curriculums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates/curriculums/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCurriculumRequest $request)
    {
        $data=$request->validated();

        $curriculum=Curriculum::create($data);

        if ($curriculum){
            return redirect()->route('curriculum.index')->with('success','تم اضافة المنهج بنجاح');
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curriculum = Curriculum::with('levels')->findOrFail($id);
        return view('templates/curriculums/show', compact('curriculum'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $curriculum= curriculum::findOrFail($id);
        return view('templates/curriculums/edit',compact('curriculum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCurriculumRequest $request, string $id)
    {
        $curriculum= curriculum::findOrFail($id);
        $data=$request->validated();
        $curriculum->update($data);

        return redirect()->route('curriculum.index')->with('success','تم تعديل المنهج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curriculum= curriculum::findOrFail($id);
        if ($curriculum){

            $curriculum->delete();

            return redirect()->route('curriculum.index')->with('success','تم حذف المنهج بنجاح');
        }
    }
}
