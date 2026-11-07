@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h2 class="h5 page-title">Permission: {{ $permission->name }}</h2>
            <div class="card shadow">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $permission->name }}</p>
                    <p><strong>Guard:</strong> {{ $permission->guard_name }}</p>
                    <p><strong>Roles:</strong></p>
                    <ul>
                        @forelse($permission->roles as $role)
                            <li>{{ $role->name }}</li>
                        @empty
                            <li class="text-muted">Not assigned to any role.</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
