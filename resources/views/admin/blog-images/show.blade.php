@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Blog Image Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $blogImage->id }}</td></tr>
                        <tr><th>Blog</th><td>{{ $blogImage->blog->title ?? '—' }}</td></tr>
                        <tr><th>Image Path</th><td>{{ $blogImage->image_path }}</td></tr>
                    </table>
                    <a href="{{ route('admin.blog-images.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
