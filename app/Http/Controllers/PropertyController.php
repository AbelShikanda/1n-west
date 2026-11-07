<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a filtered, paginated listing of properties.
     */
    public function index(Request $request)
    {
        $query = Property::query()->with(['category', 'type', 'primaryImage']);

        $search = trim((string) $request->input('search'));
        $location = trim((string) $request->input('location'));

        $query->when($search !== '', function (Builder $query) use ($search) {
            $query->where(function (Builder $query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('town', 'like', "%{$search}%")
                    ->orWhere('county', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%")
                    ->orWhere('meta_description', 'like', "%{$search}%");
            });
        });

        $query->when($location !== '', function (Builder $query) use ($location) {
            $query->where(function (Builder $query) use ($location) {
                $query->where('town', 'like', "%{$location}%")
                    ->orWhere('county', 'like', "%{$location}%")
                    ->orWhere('country', 'like', "%{$location}%");
            });
        });

        $query->when($request->filled('category'), function (Builder $query) use ($request) {
            $query->where('categories_id', $request->integer('category'));
        });

        $query->when($request->filled('type'), function (Builder $query) use ($request) {
            $query->where('types_id', $request->integer('type'));
        });

        $query->when(is_numeric($request->input('min_price')), function (Builder $query) use ($request) {
            $query->where('price', '>=', (float) $request->input('min_price'));
        });

        $query->when(is_numeric($request->input('max_price')), function (Builder $query) use ($request) {
            $query->where('price', '<=', (float) $request->input('max_price'));
        });

        $query->when($request->filled('rooms'), function (Builder $query) use ($request) {
            $query->where('rooms', '>=', $request->integer('rooms'));
        });

        $query->when($request->filled('baths'), function (Builder $query) use ($request) {
            $query->where('baths', '>=', $request->integer('baths'));
        });

        $query->when($request->input('parking') === '1', function (Builder $query) {
            $query->where('parking', true);
        });

        match ($request->input('sort')) {
            'price_asc' => $query->orderBy('price'),
            'price_desc' => $query->orderByDesc('price'),
            'rooms' => $query->orderByDesc('rooms'),
            default => $query->latest(),
        };

        $properties = $query->paginate(9)->withQueryString();

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
     * Display the specified property.
     */
    public function show($slug)
    {
        $property = Property::with(['category', 'type', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.property-details', compact('property'));
    }
}
