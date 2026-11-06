<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $properties = Property::with(['category', 'type'])->latest()->take(6)->get();

        return view('home', compact('properties'));
    }
}
