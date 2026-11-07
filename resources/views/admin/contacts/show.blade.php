@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h2 class="h5 page-title">Contact Message</h2>
            <div class="card shadow">
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone ?: '—' }}</p>
                    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p><strong>Message:</strong></p>
                    <p>{{ $contact->message }}</p>
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
