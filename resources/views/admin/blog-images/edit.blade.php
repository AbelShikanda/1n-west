@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Edit Blog Image</h2>
                    <form action="{{ route('admin.blog-images.update', $blogImage) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Blog</label>
                            <select name="blog_id" class="form-select" required>
                                @foreach($blogs as $blog)
                                    <option value="{{ $blog->id }}" {{ $blogImage->blog_id == $blog->id ? 'selected' : '' }}>{{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="image_path" class="form-control" value="{{ old('image_path', $blogImage->image_path) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Image</button>
                        <a href="{{ route('admin.blog-images.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
