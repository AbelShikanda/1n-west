@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Property Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $property->id }}</td></tr>
                        <tr><th>Name</th><td>{{ $property->name }}</td></tr>
                        <tr><th>Slug</th><td>{{ $property->slug }}</td></tr>
                        <tr><th>Category</th><td>{{ $property->category->name ?? '—' }}</td></tr>
                        <tr><th>Type</th><td>{{ $property->type->name ?? '—' }}</td></tr>
                        <tr><th>Price</th><td>Ksh {{ number_format($property->price) }}</td></tr>
                        <tr><th>Rooms</th><td>{{ $property->rooms ?? '—' }}</td></tr>
                        <tr><th>Baths</th><td>{{ $property->baths ?? '—' }}</td></tr>
                        <tr><th>Town</th><td>{{ $property->town ?? '—' }}</td></tr>
                        <tr><th>County</th><td>{{ $property->county ?? '—' }}</td></tr>
                        <tr><th>Parking</th><td>{{ $property->parking ? 'Yes' : 'No' }}</td></tr>
                        <tr><th>Promotion</th><td>{{ $property->promotion ? 'Yes' : 'No' }}</td></tr>
                        <tr><th>Meta Image</th><td>{{ $property->meta_image ?? '—' }}</td></tr>
                    </table>
                    @if($property->images->count() > 0)
                        <h6 class="mt-3">Images</h6>
                        <ul class="list-group">
                            @foreach($property->images as $image)
                                <li class="list-group-item">{{ $image->image_path }} {{ $image->is_primary ? '(Primary)' : '' }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
