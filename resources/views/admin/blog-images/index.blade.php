@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Blog Images</h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.blog-images.create') }}" class="btn btn-primary">Add Image</a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Blog</th>
                                <th>Image Path</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td>{{ $image->blog->title ?? '—' }}</td>
                                    <td>{{ $image->image_path }}</td>
                                    <td>
                                        <a href="{{ route('admin.blog-images.show', $image) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.blog-images.edit', $image) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.blog-images.destroy', $image) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $images->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
