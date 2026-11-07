@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Edit Property Image</h2>
                    <form action="{{ route('admin.property-images.update', $propertyImage) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Property</label>
                            <select name="property_id" class="form-select" required>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ $propertyImage->property_id == $property->id ? 'selected' : '' }}>{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="image_path" class="form-control" value="{{ old('image_path', $propertyImage->image_path) }}" required>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_primary" value="1" class="form-check-input" {{ $propertyImage->is_primary ? 'checked' : '' }}>
                            <label class="form-check-label">Is Primary</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Image</button>
                        <a href="{{ route('admin.property-images.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
