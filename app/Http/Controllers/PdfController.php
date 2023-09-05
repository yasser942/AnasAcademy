<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePdfRequest;
use App\Models\Lesson;
use App\Models\PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
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
        return view('templates/resources/pdfs/create', compact('lesson'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePdfRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $pdf = new PDF();
        $pdf->name = $data['name'];
        $pdf->description = $data['description'];
        $pdf->status = $data['status'];
        $pdf->link = $data['link'];
        $pdf->type = $data['type'];
        $pdf->lesson_id = $data['lesson_id'];

        // Save the new Unit record
        $pdf->save();

        if ($pdf){
            return redirect()->route('lesson.show',[$pdf->lesson_id])->with('success','تم اضافة المصدر بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pdf=PDF::findOrFail($id);
        return view('templates/resources/pdfs/show',compact('pdf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pdf=PDF::findOrFail($id);
        $pdf->delete();
        return redirect()->route('lesson.show',[$pdf->lesson_id])->with('success','تم حذف الدرس بنجاح');
    }
}
