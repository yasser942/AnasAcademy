<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePracticalCardRequest;
use App\Models\PracticalCard;
use Illuminate\Http\Request;

class PracticalCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practicalCards=PracticalCard::paginate(10);
        return view('templates.practical-cards.index',compact('practicalCards'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.practical-cards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePracticalCardRequest $request)
    {
        $practicalCard=PracticalCard::create($request->validated());
        return redirect()->route('practical-card.index')->with('success','تم اضافة البطاقة العملية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $practicalCard=PracticalCard::findOrFail($id);
        return view('templates.practical-cards.show',compact('practicalCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $practicalCard=PracticalCard::findOrFail($id);
        return view('templates.practical-cards.edit',compact('practicalCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatePracticalCardRequest $request, string $id)
    {
        $practicalCard=PracticalCard::findOrFail($id);
        $practicalCard->update($request->validated());
        return redirect()->route('practical-card.index')->with('success','تم تعديل البطاقة العملية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $practicalCard=PracticalCard::findOrFail($id);
        $practicalCard->delete();
        return redirect()->route('practical-card.index')->with('success','تم حذف البطاقة العملية بنجاح');
    }
}
