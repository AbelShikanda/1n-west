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
                            @foreach($properties as $property)
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
                            @endforeach
                        </tbody>
                    </table>
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
