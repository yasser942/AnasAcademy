<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWordCategoryRequest;
use App\Models\WordCategory;
use Illuminate\Http\Request;

class WordCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wordCategories = WordCategory::latest()->paginate(10);
        return view('templates.word-category.index', compact('wordCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('templates.word-category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateWordCategoryRequest $request)
    {
        WordCategory::create($request->validated());
        return redirect()->route('word-category.index')->with('success', 'تم إضافة المجموعة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=WordCategory::with('cards')->findOrFail($id);

        return view('templates.word-category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = WordCategory::findOrFail($id);
        return view('templates.word-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateWordCategoryRequest $request, string $id)
    {
        $category = WordCategory::findOrFail($id);
        $category->update($request->validated());
        return redirect()->route('word-category.index')->with('success', 'تم تعديل المجموعة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = WordCategory::findOrFail($id);
            $category->delete();
            return redirect()->route('word-category.index')->with('success', 'تم حذف المجموعة بنجاح');
        } catch (\Exception $e) {
            return redirect()->route('word-category.index')->with('error', 'حدث خطأ أثناء حذف المجموعة');
        }
    }
}
