@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Create Property</h2>
                    <form action="{{ route('admin.properties.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Category</label>
                                <select name="categories_id" class="form-select" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type</label>
                                <select name="types_id" class="form-select" required>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Rooms</label>
                                <input type="number" name="rooms" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Baths</label>
                                <input type="number" name="baths" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Town</label>
                                <input type="text" name="town" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">County</label>
                                <input type="text" name="county" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Meta Image</label>
                                <input type="text" name="meta_image" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="parking" value="1" class="form-check-input">
                                    <label class="form-check-label">Parking</label>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="promotion" value="1" class="form-check-input">
                                    <label class="form-check-label">Promotion</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Property</button>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
