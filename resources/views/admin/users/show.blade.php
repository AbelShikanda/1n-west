@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">User Details</h2>
                    <table class="table table-bordered">
                        <tr><th>ID</th><td>{{ $user->id }}</td></tr>
                        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Tenant</th><td>{{ $user->tenant ? 'Yes' : 'No' }}</td></tr>
                    </table>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
