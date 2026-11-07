@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Properties</h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Add Property</a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="GET" action="{{ route('admin.properties.index') }}" class="row g-2 align-items-end mb-3">
                <div class="col-md-4">
                    <label class="form-label">Search</label>
                    <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Name, town or county">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="">All categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected((string) request('category') === (string) $category->id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-select">
                        <option value="">All types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" @selected((string) request('type') === (string) $type->id)>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($properties as $property)
                                <tr>
                                    <td>{{ $property->id }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->category->name ?? '—' }}</td>
                                    <td>{{ $property->type->name ?? '—' }}</td>
                                    <td>Ksh {{ number_format($property->price) }}</td>
                                    <td>
                                        <a href="{{ route('admin.properties.show', $property) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.properties.destroy', $property) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-muted">No properties found. Add your first listing.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
