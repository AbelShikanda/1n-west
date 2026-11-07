<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImages;
use Illuminate\Http\Request;

class PropertyImagesController extends Controller
{
    public function index()
    {
        $images = PropertyImages::with('property')->latest()->paginate(10);

        return view('admin.property-images.index', compact('images'));
    }

    public function create()
    {
        $properties = Property::all();

        return view('admin.property-images.create', compact('properties'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'image_path' => 'required|string|max:255',
            'is_primary' => 'boolean',
        ]);

        PropertyImages::create($validated);

        return redirect()
            ->route('admin.property-images.index')
            ->with('success', 'Property image created successfully.');
    }

    public function show(PropertyImages $propertyImage)
    {
        $propertyImage->load('property');

        return view('admin.property-images.show', compact('propertyImage'));
    }

    public function edit(PropertyImages $propertyImage)
    {
        $properties = Property::all();

        return view('admin.property-images.edit', compact('propertyImage', 'properties'));
    }

    public function update(Request $request, PropertyImages $propertyImage)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'image_path' => 'required|string|max:255',
            'is_primary' => 'boolean',
        ]);

        $propertyImage->update($validated);

        return redirect()
            ->route('admin.property-images.index')
            ->with('success', 'Property image updated successfully.');
    }

    public function destroy(PropertyImages $propertyImage)
    {
        $propertyImage->delete();

        return redirect()
            ->route('admin.property-images.index')
            ->with('success', 'Property image deleted successfully.');
    }
}
