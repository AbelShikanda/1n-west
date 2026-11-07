@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    <div id="fh5co-about">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Our Staff</h3>
                    <p>Meet the people who help you find the right home.</p>
                </div>
            </div>
            <div class="row">
                @forelse ($staff as $member)
                    <div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <img class="img-responsive" src="{{ avatar_url($member->avatar, $member->name) }}"
                                alt="{{ $member->name }}">
                            <h3>{{ $member->name }}</h3>
                            <span class="list-prop">{{ $member->is_admin ? 'Administrator' : 'Staff' }}</span>
                            <p>{{ $member->username ? '@' . $member->username : '' }}</p>
                            <p class="fh5co-social-icons">
                                @if (setting('social_twitter'))
                                    <a href="{{ setting('social_twitter') }}" target="_blank" rel="noopener noreferrer"><i class="icon-twitter2"></i></a>
                                @endif
                                @if (setting('social_facebook'))
                                    <a href="{{ setting('social_facebook') }}" target="_blank" rel="noopener noreferrer"><i class="icon-facebook2"></i></a>
                                @endif
                                @if (setting('social_instagram'))
                                    <a href="{{ setting('social_instagram') }}" target="_blank" rel="noopener noreferrer"><i class="icon-instagram"></i></a>
                                @endif
                                @if ($member->email)
                                    <a href="mailto:{{ $member->email }}"><i class="icon-mail"></i></a>
                                @endif
                            </p>
                            <p><a class="btn btn-primary btn-outline" href="{{ route('properties') }}">View Properties</a></p>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12 text-center animate-box">
                        <div class="property">
                            <div class="property-details">
                                <h3>No staff profiles available</h3>
                                <p>Our team profiles are being updated. Please use the contact page to reach us.</p>
                                <a class="btn btn-primary" href="{{ route('contact') }}">Contact Us</a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
