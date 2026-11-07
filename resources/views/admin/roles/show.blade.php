@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="h5 page-title">Role: {{ $role->name }}</h2>
            <div class="card shadow">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $role->name }}</p>
                    <p><strong>Guard:</strong> {{ $role->guard_name }}</p>
                    <p><strong>Permissions:</strong></p>
                    <ul>
                        @forelse($role->permissions as $permission)
                            <li>{{ $permission->name }}</li>
                        @empty
                            <li class="text-muted">No permissions assigned.</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
