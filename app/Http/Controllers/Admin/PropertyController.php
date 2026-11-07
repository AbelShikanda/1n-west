<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['category', 'type']);

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('town', 'like', "%{$search}%")
                    ->orWhere('county', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('categories_id', $request->integer('category'));
        }

        if ($request->filled('type')) {
            $query->where('types_id', $request->integer('type'));
        }

        $properties = $query->latest()->paginate(10)->withQueryString();
        $categories = PropertyCategories::orderBy('name')->get();
        $types = PropertyTypes::orderBy('name')->get();

        return view('admin.properties.index', compact('properties', 'categories', 'types'));
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
            'rooms' => 'nullable|integer|min:0',
            'baths' => 'nullable|integer|min:0',
            'living_rooms' => 'nullable|integer|min:0',
            'kitchens' => 'nullable|integer|min:0',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|string|max:255',
            'parking' => 'boolean',
            'whatsapp' => 'boolean',
            'telegram' => 'boolean',
            'website' => 'boolean',
            'promotion' => 'boolean',
        ]);

        $validated = array_merge($validated, [
            'meta_description' => $validated['meta_description'] ?? '',
            'meta_keywords' => $validated['meta_keywords'] ?? '',
            'meta_image' => $validated['meta_image'] ?? '',
            'parking' => $request->boolean('parking'),
            'whatsapp' => $request->boolean('whatsapp'),
            'telegram' => $request->boolean('telegram'),
            'website' => $request->boolean('website'),
            'promotion' => $request->boolean('promotion'),
        ]);

        Property::create($validated);

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
            'rooms' => 'nullable|integer|min:0',
            'baths' => 'nullable|integer|min:0',
            'living_rooms' => 'nullable|integer|min:0',
            'kitchens' => 'nullable|integer|min:0',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|string|max:255',
            'parking' => 'boolean',
            'whatsapp' => 'boolean',
            'telegram' => 'boolean',
            'website' => 'boolean',
            'promotion' => 'boolean',
        ]);

        $validated['parking'] = $request->boolean('parking');
        $validated['whatsapp'] = $request->boolean('whatsapp');
        $validated['telegram'] = $request->boolean('telegram');
        $validated['website'] = $request->boolean('website');
        $validated['promotion'] = $request->boolean('promotion');

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
