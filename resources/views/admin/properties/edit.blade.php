@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="h5 page-title mb-3">Edit Property</h2>
                    <form action="{{ route('admin.properties.update', $property) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('admin.properties._form', ['property' => $property])
                        <button type="submit" class="btn btn-primary">Update Property</button>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
