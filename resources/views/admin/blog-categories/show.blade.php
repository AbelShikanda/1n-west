@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h2 class="h5 page-title">Blog Category: {{ $blogCategory->name }}</h2>
            <div class="card shadow">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $blogCategory->name }}</p>
                    <p><strong>Slug:</strong> {{ $blogCategory->slug }}</p>
                    <a href="{{ route('blog-categories.edit', $blogCategory) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('blog-categories.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
