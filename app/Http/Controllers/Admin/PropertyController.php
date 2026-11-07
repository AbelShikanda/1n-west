<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['category', 'type'])->latest()->paginate(10);

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = PropertyCategories::all();
        $types = PropertyTypes::all();

        return view('admin.properties.create', compact('categories', 'types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:properties,slug',
            'categories_id' => 'required|exists:property_categories,id',
            'types_id' => 'required|exists:property_types,id',
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'rooms' => 'nullable|integer',
            'baths' => 'nullable|integer',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|string|max:255',
            'parking' => 'boolean',
            'promotion' => 'boolean',
        ]);

        Property::create(array_merge($validated, [
            'meta_description' => $validated['meta_description'] ?? '',
            'meta_keywords' => $validated['meta_keywords'] ?? '',
            'meta_image' => $validated['meta_image'] ?? '',
            'parking' => $validated['parking'] ?? 0,
            'whatsapp' => $validated['whatsapp'] ?? 0,
            'telegram' => $validated['telegram'] ?? 0,
            'website' => $validated['website'] ?? 0,
            'promotion' => $validated['promotion'] ?? 0,
        ]));

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $property->load('category', 'type', 'images');

        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $categories = PropertyCategories::all();
        $types = PropertyTypes::all();

        return view('admin.properties.edit', compact('property', 'categories', 'types'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:properties,slug,' . $property->id,
            'categories_id' => 'required|exists:property_categories,id',
            'types_id' => 'required|exists:property_types,id',
            'price' => 'required|numeric',
            'country' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'rooms' => 'nullable|integer',
            'baths' => 'nullable|integer',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|string|max:255',
            'parking' => 'boolean',
            'promotion' => 'boolean',
        ]);

        $property->update($validated);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}
