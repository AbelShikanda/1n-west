@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    <p><strong>{{ __('Name') }}:</strong> {{ $user->name }}</p>
                    <p><strong>{{ __('Email') }}:</strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
