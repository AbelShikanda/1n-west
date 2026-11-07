@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Create Blog Image</h2>
                    <form action="{{ route('admin.blog-images.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Blog</label>
                            <select name="blog_id" class="form-select" required>
                                @foreach($blogs as $blog)
                                    <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image Path</label>
                            <input type="text" name="image_path" class="form-control" required placeholder="e.g. blog-1.jpg">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Image</button>
                        <a href="{{ route('admin.blog-images.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
