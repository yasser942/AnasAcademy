<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCardRequest;
use App\Models\Card;
use App\Models\WordCategory;
use Illuminate\Http\Request;

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
        $request['word_category_id'] = $wordCategory->id;
        $wordCategory->cards()->create($request->validated());
        return redirect()->route('word-category.show', $id)->with('success', 'تم إضافة الكلمة بنجاح');
    }


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
        $card->update($request->validated());
        return redirect()->route('word-category.show', $card->word_category_id)->with('success', 'تم تعديل الكلمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $card = Card::findOrFail($id);
            $card->delete();
            return redirect()->route('word-category.show',[$card->word_category_id ])->with('success', 'تم حذف الكلمة بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('word-category.show',[$card->word_category_id ])->with('error', 'حدث خطأ أثناء حذف الكلمة');
        }
    }
    public function addToFavorite(Request $request)
    {

        $card = Card::findOrFail($request->id);
        if ($card->users()->where('user_id', auth()->user()->id)->exists()) {

            return redirect()->route('word-category.show', $card->id)->with('error', 'تم إضافة الكلمة إلى المفضلة من قبل');

        } else {
            $card->users()->attach(auth()->user()->id);
            return redirect()->route('word-category.show', $card->wordCategory->id)->with('success', 'تم إضافة الكلمة إلى المفضلة بنجاح');
        }
    }
    public function deleteFavorite(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->users()->detach(auth()->user()->id);
        return redirect()->route('word-category.show', $card->id)->with('success', 'تم حذف الكلمة من المفضلة بنجاح');
    }
     public function favorite()
     {
         $cards = auth()->user()->cards()->paginate(10);
         return view('templates.cards.favorite', compact('cards'));
     }
}
