@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @include('layouts.partials.searchProperties')

    <div id="fh5co-about">
        <div class="container">
            <div class="row">
                @foreach ($staff as $member)
                    <div class="col-sm-4 text-center animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co-staff">
                            <img class="img-responsive" src="{{ asset('1n-west/images/user-1.jpg') }}"
                                alt="{{ $member->name }}">
                            <h3>{{ $member->name }}</h3>
                            <span class="list-prop"></span>
                            <p>{{ $member->is_staff ? 'Staff' : '' }}</p>
                            <p class="fh5co-social-icons">
                                <a href="{{ route('agent') }}"><i class="icon-twitter2"></i></a>
                                <a href="{{ route('agent') }}"><i class="icon-facebook2"></i></a>
                                <a href="{{ route('agent') }}"><i class="icon-instagram"></i></a>
                            </p>
                            <p><a class="btn btn-primary btn-outline" href="{{ route('properties') }}">View Properties</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
