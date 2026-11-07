@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @auth
        @include('layouts.partials.searchProperties')
    @endauth

    <div id="fh5co-features">
        <div class="container">
            <div class="row">
                <div class="col-md-4 animate-box">
                    <div class="feature-left">
                        <span class="icon">
                            <i class="icon-map"></i>
                        </span>
                        <div class="feature-copy">
                            <h3>Move House</h3>
                            <p>
                                Are you looking for moving services, or alternative rental
                                properties witin our portfolio?
                            </p>
                            <p><a href="{{ route('properties') }}">Learn More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="feature-left">
                        <span class="icon">
                            <i class="icon-browser"></i>
                        </span>
                        <div class="feature-copy">
                            <h3>Mortgage</h3>
                            <p>
                                Would you like to transition from a tenant to a
                                home-owner?
                            </p>
                            <p><a href="{{ route('properties') }}">Learn More</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate-box">
                    <div class="feature-left">
                        <span class="icon">
                            <i class="icon-chat"></i>
                        </span>
                        <div class="feature-copy">
                            <h3>Explorer</h3>
                            <p>
                                Explore you neighborhood, the nearby schools, market,
                                and parks.
                            </p>
                            <p><a href="{{ route('properties') }}">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.newProperties')

    <div id="fh5co-about" class="fh5co-agent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Staff</h3>
                    <p>Meet our dedicated staff who work tirelessly for your convenience to provide the best and secure environment to live in.</p>
                </div>
            </div>
            <div class="row">
                @if($staff->isNotEmpty())
                    @foreach($staff as $member)
                        <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
                            <div class="fh5co-staff">
                                <img class="img-responsive"
                                     src="{{ $member->avatar ? asset($member->avatar) : asset('1n-west/images/user-1.jpg') }}"
                                     alt="{{ $member->name }}">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->is_staff ? 'Staff' : '' }}</p>
                                <p class="fh5co-social-icons">
                                    <a href="{{ route('agent') }}" title="Agent profile"><i class="icon-user"></i></a>
                                    <a href="{{ route('contact') }}" title="Contact us"><i class="icon-mail"></i></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center animate-box">
                        <div class="property">
                            <div class="property-details">
                                <h3>No staff available</h3>
                                <p>Check back soon for our team.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('layouts.partials.blog', ['blogs' => $recentBlogs])

    <!-- fh5co-blog-section -->
    <div id="fh5co-contact" class="fh5co-contact">
        <div class="half-contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center heading-section animate-box">
                        <h3>Ask for help, We're here to help 24/7</h3>
                        <p>Need assistance with renting? Speak to an available staff to provide the guidance you need. We are only a message away.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required value="{{ old('subject') }}" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" cols="30" rows="7" placeholder="Message" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                        <a href="{{ route('contact') }}" class="btn btn-default">Contact Page</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="half-bg" style="background-image: url('{{ asset('1n-west/images/cover_bg_2.jpg') }}')"></div>
    </div>
@endsection
