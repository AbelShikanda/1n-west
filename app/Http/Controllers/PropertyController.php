<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Property::with(['category', 'type']);

        if ($request->filled('category')) {
            $query->where('categories_id', $request->category);
        }

        if ($request->filled('type')) {
            $query->where('types_id', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('town', 'like', "%{$search}%")
                  ->orWhere('county', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%");
            });
        }

        $properties = $query->latest()->paginate(9);

        $pageTitle = 'View Apartments';
        $breadcrumbLinks = [
            'DescriptionOne' => 'You will',
            'DescriptionTwo' => 'Our other apartments',
            'url' => '/properties',
            'label' => 'apartments',
        ];

        return view('pages.properties', compact('properties', 'pageTitle', 'breadcrumbLinks'));
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $property = Property::with(['category', 'type'])->where('slug', $slug)->firstOrFail();

        return view('pages.property-details', compact('property'));
    }
}
