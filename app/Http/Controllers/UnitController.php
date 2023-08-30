<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnitRequest;
use App\Models\Level;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
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
        $level= Level::findOrFail($id);
        return view('templates/units/create',compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUnitRequest $request)
    {
        $data=$request->validated();
        // Create a new Unit instance and fill it with the data
        $unit = new Unit();
        $unit->name = $data['name'];
        $unit->description = $data['description'];
        $unit->status = $data['status'];
        $unit->level_id = $data['level_id'];

        // Save the new Unit record
        $unit->save();

        if ($unit){
            return redirect()->route('level.show',[$unit->level_id])->with('success','تم اضافة الوحدة بنجاح');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unit =Unit::with('lessons')->findOrFail($id);

        return view('templates/units/show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $unit= Unit::findOrFail($id);
        return view('templates/units/edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUnitRequest $request, string $id)
    {
        $unit= Unit::findOrFail($id);
        $data=$request->validated();
        $unit->update($data);

        return redirect()->route('level.show',[$unit->level_id])->with('success','تم تعديل الوحدة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit=Unit::findOrFail($id);
        $unit->delete();
        if ($unit){
            return redirect()->route('level.show',[$unit->level_id])->with('success','تم حذف الوحدة بنجاح');
        }
    }
}
