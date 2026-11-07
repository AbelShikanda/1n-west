@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="h5 page-title">Edit Role</h2>
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name) }}" required>
                            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                        </div>
                        <div class="form-group">
                            <label>Permissions</label>
                            <div class="row">
                                @forelse($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm-{{ $permission->id }}" {{ in_array($permission->name, old('permissions', $role->permissions->pluck('name')->all())) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perm-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-muted">No permissions available.</div>
                                @endforelse
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
