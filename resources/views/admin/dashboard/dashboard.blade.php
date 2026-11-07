@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Welcome, {{ auth('admin')->user()?->name ?? 'Administrator' }}</h2>
                    <p class="text-muted small mb-0">{{ now()->format('l, j F Y') }}</p>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Add Property</a>
                </div>
            </div>

            <div class="row my-4">
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <small class="text-muted mb-1">Properties</small>
                            <h3 class="card-title mb-0">{{ number_format($totalProperties) }}</h3>
                            <a class="small" href="{{ route('admin.properties.index') }}">Manage properties</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <small class="text-muted mb-1">Page views this week</small>
                            <h3 class="card-title mb-0">{{ number_format($pageViewsThisWeek) }}</h3>
                            <p class="small mb-0 {{ $viewsChange >= 0 ? 'text-success' : 'text-danger' }}">
                                <span class="fe fe-arrow-{{ $viewsChange >= 0 ? 'up' : 'down' }} fe-12"></span>
                                {{ $viewsChange >= 0 ? '+' : '' }}{{ $viewsChange }}% vs last week
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <small class="text-muted mb-1">Conversions this week</small>
                            <h3 class="card-title mb-0">{{ number_format($conversionsThisWeek) }}</h3>
                            <a class="small" href="{{ route('admin.contacts.index') }}">View enquiries</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <small class="text-muted mb-1">Visitors this week</small>
                            <h3 class="card-title mb-0">{{ number_format($visitorsThisWeek) }}</h3>
                            <span class="small text-muted">Tracked sessions</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header"><strong>Page views (last 7 days)</strong></div>
                <div class="card-body">
                    <canvas id="viewsTrend" height="90"></canvas>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Properties by category</strong></div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    @forelse ($propertiesByCategory as $category)
                                        <tr>
                                            <td>{{ $category->name }}</td>
                                            <td class="text-right">{{ $category->properties_count }}</td>
                                        </tr>
                                    @empty
                                        <tr><td class="text-muted">No categories yet.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Properties by type</strong></div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    @forelse ($propertiesByType as $type)
                                        <tr>
                                            <td>{{ $type->name }}</td>
                                            <td class="text-right">{{ $type->properties_count }}</td>
                                        </tr>
                                    @empty
                                        <tr><td class="text-muted">No property types yet.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <strong>Recent properties</strong>
                            <a class="small" href="{{ route('admin.properties.index') }}">View all</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr><th>Name</th><th>Category</th><th>Price</th><th></th></tr>
                                </thead>
                                <tbody>
                                    @forelse ($recentProperties as $property)
                                        <tr>
                                            <td>{{ $property->name }}</td>
                                            <td>{{ $property->category?->name ?? '—' }}</td>
                                            <td>Ksh {{ number_format($property->price) }}</td>
                                            <td class="text-right">
                                                <a class="small" href="{{ route('admin.properties.show', $property) }}">View</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="4" class="text-muted">No properties yet. Add your first listing.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Top regions</strong></div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    @forelse ($topRegions as $region)
                                        <tr><td>{{ $region->region }}</td><td class="text-right">{{ $region->total }}</td></tr>
                                    @empty
                                        <tr><td class="text-muted">No visitor regions recorded.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Traffic sources</strong></div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    @forelse ($trafficSources as $source)
                                        <tr><td>{{ $source->utm_source }}</td><td class="text-right">{{ $source->total }}</td></tr>
                                    @empty
                                        <tr><td class="text-muted">No traffic sources recorded.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>Browsers</strong></div>
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <tbody>
                                    @forelse ($browsers as $browser)
                                        <tr><td>{{ $browser->browser }}</td><td class="text-right">{{ $browser->total }}</td></tr>
                                    @empty
                                        <tr><td class="text-muted">No browser data recorded.</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><div class="card shadow mb-4"><div class="card-body"><small class="text-muted">Admins</small><h3 class="mb-0">{{ $totalAdmins }}</h3></div></div></div>
                <div class="col-md-4"><div class="card shadow mb-4"><div class="card-body"><small class="text-muted">Staff</small><h3 class="mb-0">{{ $totalStaff }}</h3></div></div></div>
                <div class="col-md-4"><div class="card shadow mb-4"><div class="card-body"><small class="text-muted">Client accounts</small><h3 class="mb-0">{{ $totalUsers }}</h3></div></div></div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var canvas = document.getElementById('viewsTrend');
        if (!canvas || typeof Chart === 'undefined') {
            return;
        }

        new Chart(canvas.getContext('2d'), {
            type: 'line',
            data: {
                labels: @json($trend->pluck('label')),
                datasets: [{
                    label: 'Page views',
                    data: @json($trend->pluck('views')),
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13,110,253,0.12)',
                    fill: true,
                    tension: 0.35
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
            }
        });
    });
</script>
@endsection
