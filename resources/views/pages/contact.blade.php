@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
    @endif
    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger">{{ session('error') }}</div>
        </div>
    @endif

    @php
        $contactPhone = setting('contact_phone');
        $contactEmail = setting('contact_email');
        $contactWebsite = setting('contact_website');
    @endphp

    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Contact Information</h3>
                    <p>
                        Need assistance with buying or renting?
                    </p>
                </div>
            </div>
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="row animate-box">
                    <div class="col-md-6">
                        <h3 class="section-title">Our Address</h3>
                        <p>
                            Speak to an available agent to
                            provide the guidance you need to make an informed real estate decision.
                            We are only a message away 24/7.
                        </p>
                        <ul class="contact-info">
                            @if (setting('contact_address'))
                                <li><i class="icon-location-pin"></i>{{ setting('contact_address') }}</li>
                            @endif
                            @if ($contactPhone)
                                <li><i class="icon-phone2"></i><a href="tel:{{ preg_replace('/[^\d+]/', '', $contactPhone) }}">{{ $contactPhone }}</a></li>
                            @endif
                            @if ($contactEmail)
                                <li><i class="icon-mail"></i><a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a></li>
                            @endif
                            @if ($contactWebsite)
                                <li><i class="icon-globe2"></i><a href="{{ setting_link('contact_website') }}" target="_blank" rel="noopener noreferrer">{{ $contactWebsite }}</a></li>
                            @endif
                            @if (! setting('contact_address') && ! $contactPhone && ! $contactEmail && ! $contactWebsite)
                                <li class="text-muted">Contact details are being updated. Please use the form to reach us.</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group @error('name') has-error @enderror">
                                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group @error('email') has-error @enderror">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @error('subject') has-error @enderror">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                                    @error('subject')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group @error('message') has-error @enderror">
                                    <textarea class="form-control" id="message" cols="30" rows="7" placeholder="Message" name="message">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="map" class="fh5co-map"></div>
@endsection
