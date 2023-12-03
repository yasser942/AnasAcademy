<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLevelRequest;
use App\Models\Curriculum;
use App\Models\Level;
use App\traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    use UploadTrait;
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
       $curriculum= Curriculum::findOrFail($id);
        return view('templates/levels/create',compact('curriculum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLevelRequest $request)
    {
        DB::beginTransaction();
        try{
            $data=$request->validated();
            // Create a new Level instance and fill it with the data
            $level = new Level();
            $level->name = $data['name'];
            $level->description = $data['description'];
            $level->status = $data['status'];
            $level->curriculum_id = $data['curriculum_id'];


            // Save the new Level record
            $level->save();
            $this->verifyAndStoreImage($request,'image','levels','public',$level->id,'App\Models\Level','name');

            DB::commit();

            if ($level){
                return redirect()->route('curriculum.show',[$level->curriculum_id])->with('success','تم اضافة المستوى بنجاح');
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
       $level= Level::with('units')->findOrFail($id);
        return view('templates/levels/show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $level=Level::findOrFail($id);
        return view('templates/levels/edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateLevelRequest $request, string $id)
    {
        DB::beginTransaction();
        try{
            $data=$request->validated();
            $level=Level::findOrFail($id);
            $level->name = $data['name'];
            $level->description = $data['description'];
            $level->status = $data['status'];
            $level->curriculum_id = $data['curriculum_id'];

            // Save the new Level record
            $level->save();
            if ($request->hasFile('image')){
                if ($level->image) {
                    $this->Delete_attachment('public','levels/'.$level->image->filename,$level->id);
                    $level->image()->delete();
                }
                $this->verifyAndStoreImage($request,'image','levels','public',$level->id,'App\Models\Level','name');
            }
            DB::commit();
            if ($level){
                return redirect()->route('curriculum.show',[$level->curriculum_id])->with('success','تم تعديل المستوى بنجاح');
            }
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
            $level=Level::findOrFail($id);
            if ($level){
                $this->Delete_attachment('public','levels/'.$level->image->filename,$level->id);
                $level->delete();
                DB::commit();
                return redirect()->route('curriculum.show',[$level->curriculum_id])->with('success','تم حذف المستوى بنجاح');
            }

        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error','حدث خطا ما يرجى المحاولة لاحقا');
        }
        }
}
