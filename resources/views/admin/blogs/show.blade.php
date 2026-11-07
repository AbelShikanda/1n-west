@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Blog Article Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $blog->id }}</td></tr>
                        <tr><th>Title</th><td>{{ $blog->title }}</td></tr>
                        <tr><th>Category</th><td>{{ $blog->category->name ?? '—' }}</td></tr>
                        <tr><th>Slug</th><td>{{ $blog->slug }}</td></tr>
                        <tr><th>Content</th><td>{{ $blog->content }}</td></tr>
                        <tr><th>Featured Image</th><td>{{ $blog->featured_image ?? '—' }}</td></tr>
                    </table>
                    @if($blog->images->count() > 0)
                        <h6 class="mt-3">Images</h6>
                        <ul class="list-group">
                            @foreach($blog->images as $image)
                                <li class="list-group-item">{{ $image->image_path }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
