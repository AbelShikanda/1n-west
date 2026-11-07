<?php

namespace App\Http\Controllers;

use App\Models\Property;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $properties = Property::with(['category', 'type'])->latest()->take(6)->get();
        $sliderProperties = $properties->isNotEmpty()
            ? $properties
            : Property::with(['category', 'type'])->latest()->take(3)->get();

        return view('home', [
            'properties' => $properties,
            'sliderProperties' => $sliderProperties,
            'pageTitle' => 'Home',
        ]);
    }
}
