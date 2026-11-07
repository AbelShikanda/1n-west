<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyTypes;
use Illuminate\Http\Request;

class PropertyTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = PropertyTypes::latest()->paginate(10);

        return view('admin.property-types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.property-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name',
            'slug' => 'nullable|string|max:255|unique:property_types,slug',
        ]);

        PropertyTypes::create($validated);

        return redirect()
            ->route('property-types.index')
            ->with('success', 'Property type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyTypes $propertyType)
    {
        return view('admin.property-types.show', compact('propertyType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyTypes $propertyType)
    {
        return view('admin.property-types.edit', compact('propertyType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyTypes $propertyType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_types,name,' . $propertyType->id,
            'slug' => 'nullable|string|max:255|unique:property_types,slug,' . $propertyType->id,
        ]);

        $propertyType->update($validated);

        return redirect()
            ->route('property-types.index')
            ->with('success', 'Property type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyTypes $propertyType)
    {
        $propertyType->delete();

        return redirect()
            ->route('property-types.index')
            ->with('success', 'Property type deleted successfully.');
    }
}
