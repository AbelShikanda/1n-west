@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @include('layouts.partials.searchProperties')

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
                            <p><a href="{{ route('underConstruction') }}">Learn More</a></p>
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
                            <p><a href="{{ route('underConstruction') }}">Learn More</a></p>
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
                            <p><a href="{{ route('underConstruction') }}">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="fh5co-popular-properties" class="fh5co-section-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>View Apartments</h3>
                    <p>
                        Have an online view of the apartment befor booking a viewing.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 animate-box">
                    <a href="{{ route('underConstruction') }}" class="fh5co-property"
                        style="background-image: url('{{ asset('1n-west/images/property-1.jpg') }}')">
                        <span class="status">Rent</span>
                        <div class="prop-details">
                            <span class="price">Ksh 50,000</span>
                            <h3>Apartment Near in Mall, Nairobi town</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- <div id="fh5co-testimonial"
                    style="background-image: url('{{ asset('1n-west/images/img_bg_2.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
                    <div class="container">
                        <div class="row animate-box">
                            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                                <h2>Happy Clients</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="box-testimony animate-box">
                                    <blockquote>
                                        <span class="quote"><span><i class="icon-quotes-right"></i></span></span>
                                        <p>
                                            &ldquo;Far far away, behind the word mountains, far from
                                            the countries Vokalia and Consonantia, there live the
                                            blind texts. Separated they live in Bookmarksgrove right
                                            at the coast of the Semantics, a large language
                                            ocean.&rdquo;
                                        </p>
                                    </blockquote>
                                    <p class="author">
                                        John Doe, CEO
                                        <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
                                        <span class="subtext">Creative Director</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

    @include('layouts.partials.newProperties')

    <div id="fh5co-about" class="fh5co-agent">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                    <h3>Staff</h3>
                    <p>
                        Meet our dedicated staff who work tirelessly for your convinience
                        to provide the best and secure environment to live in.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3 text-center animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co-staff">
                        <img class="img-responsive" src="{{ asset('1n-west/images/user-1.jpg') }}"
                            alt="Free HTML5 Templates by freeHTML5.co" />
                        <h3>Jean Smith</h3>
                        <p>
                            The caretaker
                        </p>
                        <p class="fh5co-social-icons">
                            <a href="{{ route('underConstruction') }}"><i class="icon-twitter2"></i></a>
                            <a href="{{ route('underConstruction') }}"><i class="icon-facebook2"></i></a>
                            <a href="{{ route('underConstruction') }}"><i class="icon-instagram"></i></a>
                            <!-- <a href="{{ route('underConstruction') }}"><i class="icon-dribbble2"></i></a> -->
                            <!-- <a href="{{ route('underConstruction') }}"><i class="icon-youtube"></i></a> -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.blog')

    <!-- fh5co-blog-section -->
    <div id="fh5co-contact" class="fh5co-contact">
        <div class="half-contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center heading-section animate-box">
                        <h3>Ask for help, We're here to help 24/7</h3>
                        <p>
                            Need assistance with renting? Speak to an available staff to
                            provide the guidance you need to make an informed decisions.
                            we are only a message away 24/7.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 animate-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" id="name" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="" class="form-control" id="message" cols="30" rows="7" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <!-- <input type="submit" value="Send Message" class="btn btn-primary"
                                        id="submit-btn" /> -->
                                    <a href="{{ route('underConstruction') }}" class="btn btn-primary">Send Message</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="half-bg" style="background-image: url('{{ asset('1n-west/images/cover_bg_2.jpg') }}')"></div>
    </div>
@endsection
