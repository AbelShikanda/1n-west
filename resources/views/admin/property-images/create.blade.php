@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Create Property Image</h2>
                    <form action="{{ route('admin.property-images.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Property</label>
                            <select name="property_id" class="form-select" required>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="image_path" class="form-control" required placeholder="e.g. property-1.jpg">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_primary" value="1" class="form-check-input">
                            <label class="form-check-label">Is Primary</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Image</button>
                        <a href="{{ route('admin.property-images.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
