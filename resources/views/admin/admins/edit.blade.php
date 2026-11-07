@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Edit Admin</h2>
                    <form action="{{ route('admin.admins.update', $admin) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username', $admin->username) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_admin" value="1" class="form-check-input" {{ $admin->is_admin ? 'checked' : '' }}>
                            <label class="form-check-label">Is Admin</label>
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_staff" value="1" class="form-check-input" {{ $admin->is_staff ? 'checked' : '' }}>
                            <label class="form-check-label">Is Staff</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Admin</button>
                        <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
