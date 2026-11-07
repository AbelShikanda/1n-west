<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Contacts;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use App\Models\User;
use App\Models\VisitorData;
use App\Models\VisitorJourney;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $weekStart = now()->startOfWeek();
        $previousWeekStart = now()->subWeek()->startOfWeek();

        $totalProperties = Property::count();
        $totalAdmins = Admin::where('is_admin', true)->count();
        $totalStaff = Admin::where('is_staff', true)->count();
        $totalUsers = User::count();
        $totalBlogs = Blog::count();
        $totalContacts = Contacts::count();

        $pageViewsThisWeek = VisitorJourney::where('created_at', '>=', $weekStart)->count();
        $pageViewsLastWeek = VisitorJourney::whereBetween('created_at', [$previousWeekStart, $weekStart])->count();
        $conversionsThisWeek = VisitorJourney::where('event_type', 'conversion')
            ->where('created_at', '>=', $weekStart)
            ->count();
        $visitorsThisWeek = VisitorData::where('created_at', '>=', $weekStart)->count();

        $trend = collect(range(6, 0))->map(function ($daysAgo) {
            $day = now()->subDays($daysAgo);

            return [
                'label' => $day->format('D'),
                'views' => VisitorJourney::whereDate('created_at', $day->toDateString())->count(),
            ];
        });

        $propertiesByCategory = PropertyCategories::query()
            ->withCount('properties')
            ->orderBy('name')
            ->get();

        $propertiesByType = PropertyTypes::query()
            ->withCount('properties')
            ->orderBy('name')
            ->get();

        $recentProperties = Property::with(['category', 'type'])->latest()->take(5)->get();

        $topRegions = VisitorData::query()
            ->select('region', DB::raw('count(*) as total'))
            ->whereNotNull('region')
            ->groupBy('region')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $trafficSources = VisitorData::query()
            ->select('utm_source', DB::raw('count(*) as total'))
            ->whereNotNull('utm_source')
            ->groupBy('utm_source')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $browsers = VisitorData::query()
            ->select('browser', DB::raw('count(*) as total'))
            ->whereNotNull('browser')
            ->groupBy('browser')
            ->orderByDesc('total')
            ->take(5)
            ->get();

        $viewsChange = $pageViewsLastWeek > 0
            ? round((($pageViewsThisWeek - $pageViewsLastWeek) / $pageViewsLastWeek) * 100, 1)
            : ($pageViewsThisWeek > 0 ? 100 : 0);

        return view('admin.dashboard.dashboard', compact(
            'totalProperties',
            'totalAdmins',
            'totalStaff',
            'totalUsers',
            'totalBlogs',
            'totalContacts',
            'pageViewsThisWeek',
            'pageViewsLastWeek',
            'conversionsThisWeek',
            'visitorsThisWeek',
            'viewsChange',
            'trend',
            'propertiesByCategory',
            'propertiesByType',
            'recentProperties',
            'topRegions',
            'trafficSources',
            'browsers'
        ));
    }
}
