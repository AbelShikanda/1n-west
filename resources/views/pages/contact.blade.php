@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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
                            we are only a message away 24/7.
                        </p>
                        <ul class="contact-info">
                            <li><i class="icon-location-pin"></i>Telgat street, Suite 721 Kakamega KE 7905-00200</li>
                            <li><i class="icon-phone2"></i><a href="tel:+254722729567">+254 722 729 567</a></li>
                            <li><i class="icon-mail"></i><a href="mailto:info@1n-west.com">info@1n-west.com</a></li>
                            <li><i class="icon-globe2"></i><a href="https://www.1n-west.com">www.1n-west.com</a></li>
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
