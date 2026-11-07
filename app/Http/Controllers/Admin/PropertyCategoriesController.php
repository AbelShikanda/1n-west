<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategories;
use Illuminate\Http\Request;

class PropertyCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PropertyCategories::latest()->paginate(10);

        return view('admin.property-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories,name',
            'slug' => 'nullable|string|max:255|unique:property_categories,slug',
        ]);

        PropertyCategories::create($validated);

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyCategories $propertyCategory)
    {
        return view('admin.property-categories.show', compact('propertyCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyCategories $propertyCategory)
    {
        return view('admin.property-categories.edit', compact('propertyCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyCategories $propertyCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories,name,' . $propertyCategory->id,
            'slug' => 'nullable|string|max:255|unique:property_categories,slug,' . $propertyCategory->id,
        ]);

        $propertyCategory->update($validated);

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyCategories $propertyCategory)
    {
        $propertyCategory->delete();

        return redirect()
            ->route('property-categories.index')
            ->with('success', 'Property category deleted successfully.');
    }
}
