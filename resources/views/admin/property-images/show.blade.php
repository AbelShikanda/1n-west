@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Property Image Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $propertyImage->id }}</td></tr>
                        <tr><th>Property</th><td>{{ $propertyImage->property->name ?? '—' }}</td></tr>
                        <tr><th>Image Path</th><td>{{ $propertyImage->image_path }}</td></tr>
                        <tr><th>Primary</th><td>{{ $propertyImage->is_primary ? 'Yes' : 'No' }}</td></tr>
                    </table>
                    <a href="{{ route('admin.property-images.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
