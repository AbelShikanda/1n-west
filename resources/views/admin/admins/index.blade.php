@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Admins</h2>
                </div>
                <div class="col-auto">
                    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">Add Admin</a>
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->username }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>
                                        @if($admin->is_admin && $admin->is_staff) Super Admin + Staff
                                        @elseif($admin->is_admin) Super Admin
                                        @elseif($admin->is_staff) Staff
                                        @else User
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.admins.show', $admin) }}" class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route('admin.admins.edit', $admin) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-muted">No admins found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
