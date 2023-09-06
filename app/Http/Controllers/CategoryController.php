<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be string.',
            'name.max' => 'The name may not be greater than :max characters.',
        ]);
        try {
            Category::create($attributes);
            return redirect()->route('category.index')
                ->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be string.',
            'name.max' => 'The name may not be greater than :max characters.',
        ]);
        try {
            $category->update($attributes);
            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }
}
