<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * function to display the dashboard
     *
     * This function does the following:
     * - Step 1: Get property statistics
     * - Step 2: Get admin statistics
     * - Step 3: Get category/type breakdown
     *
     * @param  Parameter type  Parameter name Description of the parameter (optional)
     * @return Return type Description of the return value (optional)
     */
    public function index()
    {
        // Step 1: Property statistics
        $totalProperties = Property::count();
        $totalViewsThisWeek = 0; // Would use VisitorJourney model
        $totalConversionsThisWeek = 0; // Would use VisitorJourney model

        // Step 2: Admin statistics
        $totalAdmins = Admin::count();
        $activeAdmins = Admin::where('is_admin', 1)->count();

        // Step 3: Category/type breakdown
        $propertiesByCategory = PropertyCategory::withCount('properties')->get();
        $propertiesByType = PropertyType::withCount('properties')->get();

        return view('admin.dashboard.dashboard', compact(
            'totalProperties',
            'totalAdmins',
            'activeAdmins',
            'propertiesByCategory',
            'propertiesByType'
        ));
    }
}