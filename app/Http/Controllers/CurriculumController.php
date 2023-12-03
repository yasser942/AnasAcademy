<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurriculumRequest;
use App\Models\Curriculum;
use App\traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurriculumController extends Controller
{
    use UploadTrait;
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
       DB::beginTransaction();
       try{

           $data=$request->validated();
           $curriculum=Curriculum::create($data);
           $this->verifyAndStoreImage($request,'image','curriculums','public',$curriculum->id,'App\Models\Curriculum','name');

           DB::commit();
           if ($curriculum){
               return redirect()->route('curriculum.index')->with('success','تم اضافة المنهج بنجاح');
           }

       }
         catch(\Exception $e){
              DB::rollBack();
              return redirect()->back()->with('error','حدث خطا ما يرجى المحاولة لاحقا');
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
        DB::beginTransaction();
        try {
            $curriculum= curriculum::findOrFail($id);
            $data=$request->validated();
            $curriculum->update($data);
            if ($request->hasFile('image')){
                if ($curriculum->image) {
                    $this->Delete_attachment('public','curriculums/'.$curriculum->image->filename,$curriculum->id);
                    $curriculum->image()->delete();
                }
                $this->verifyAndStoreImage($request,'image','curriculums','public',$curriculum->id,'App\Models\Curriculum','name');
            }

            DB::commit();

            return redirect()->route('curriculum.index')->with('success','تم تعديل المنهج بنجاح');

        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','حدث خطا ما يرجى المحاولة لاحقا');
        }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $curriculum= curriculum::findOrFail($id);
            if ($curriculum){
                $this->Delete_attachment('public','curriculums/'.$curriculum->image->filename,$curriculum->id);
                $curriculum->delete();
                DB::commit();

                return redirect()->route('curriculum.index')->with('success','تم حذف المنهج بنجاح');
            }

        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','حدث خطا ما يرجى المحاولة لاحقا');
        }

    }

}
