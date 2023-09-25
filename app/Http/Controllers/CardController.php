<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Models\Card;
use App\Models\WordCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
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
        $wordCategory = WordCategory::findOrFail($id);
        return view('templates.cards.create', compact('wordCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCardRequest $request )
    {
        $id = $request->word_category_id;
        $wordCategory = WordCategory::findOrFail($id);



        // Handle the uploaded audio file
        if ($request->hasFile('audio')) {
            $audioFile = $request->file('audio');
            $audioFileName = hash('sha256', time() . $audioFile->getClientOriginalName()) . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->storeAs('public/audio', $audioFileName); // Assuming you have a 'audio' disk in your filesystem config
        } else {
            $audioFileName = null;
        }

        // Create the card, including the audio file name
        $cardData = $request->validated();
        $cardData['audio'] = $audioFileName;

        $wordCategory->cards()->create($cardData);

        return redirect()->route('word-category.show', $id)->with('success', 'تم إضافة الكلمة بنجاح');}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $card = Card::findOrFail($id);
        return view('templates.cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCardRequest $request, string $id)
    {
        $card = Card::findOrFail($id);
        $word_category_id = $card->word_category_id;
        $request['word_category_id'] = $word_category_id;

        // Check if a new audio file is uploaded
        if ($request->hasFile('audio')) {
            // Delete the old audio file if it exists
            if ($card->audio) {
                Storage::delete('public/audio/' . $card->audio);
            }

            // Upload the new audio file
            $audioFile = $request->file('audio');
            $audioFileName = hash('sha256', time() . $audioFile->getClientOriginalName()) . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->storeAs('public/audio', $audioFileName);

            // Update the card data including the new audio file name
            $cardData = $request->validated();
            $cardData['audio'] = $audioFileName;
        } else {
            // If no new audio uploaded, keep the old audio file name
            $cardData = $request->except('audio');
        }

        // Update the card
        $card->update($cardData);

        return redirect()->route('word-category.show', $card->word_category_id)->with('success', 'تم تعديل الكلمة بنجاح');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $card = Card::findOrFail($id);

            // Check if the card has an associated audio file
            if ($card->audio) {
                // Delete the audio file from storage
                Storage::delete('public/audio/' . $card->audio);
            }

            // Delete the card
            $card->delete();

            return redirect()->route('word-category.show', [$card->word_category_id])->with('success', 'تم حذف الكلمة بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('word-category.show', [$card->word_category_id])->with('error', 'حدث خطأ أثناء حذف الكلمة');
        }
    }

     public function favorite()
     {
         $cards = auth()->user()->cards()->paginate(10);
         return view('templates.cards.favorite', compact('cards'));
     }
}
