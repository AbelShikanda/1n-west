@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h2 class="h5 page-title">Property Type Details</h2>
            <div class="card shadow">
                <div class="card-body">
                    <p><strong>ID:</strong> {{ $propertyType->id }}</p>
                    <p><strong>Name:</strong> {{ $propertyType->name }}</p>
                    <p><strong>Slug:</strong> {{ $propertyType->slug }}</p>
                    <a href="{{ route('property-types.edit', $propertyType) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('property-types.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection