@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Admin Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $admin->id }}</td></tr>
                        <tr><th>Name</th><td>{{ $admin->name }}</td></tr>
                        <tr><th>Username</th><td>{{ $admin->username }}</td></tr>
                        <tr><th>Email</th><td>{{ $admin->email }}</td></tr>
                        <tr><th>Role</th><td>
                            @if($admin->is_admin && $admin->is_staff) Super Admin + Staff
                            @elseif($admin->is_admin) Super Admin
                            @elseif($admin->is_staff) Staff
                            @else User
                            @endif
                        </td></tr>
                    </table>
                    <a href="{{ route('admin.admins.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
