@if (Request::is('/') || Request::is('home'))
    @php $slides = $sliderProperties ?? $properties ?? collect(); @endphp
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                @forelse ($slides as $property)
                    <li style="background-image: url('{{ property_image_url($property->meta_image) }}')">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <span class="status">{{ $property->promotion ? 'Featured' : 'Rent' }}</span>
                                            <h1>{{ $property->name }}</h1>
                                            <h2 class="price">Ksh {{ number_format($property->price) }}</h2>
                                            <p>{{ $property->meta_description }}</p>
                                            <p class="details">
                                                <span>{{ $property->rooms }} Bedroom{{ $property->rooms > 1 ? 's' : '' }}</span>
                                                <span>{{ $property->baths }} Bathroom{{ $property->baths > 1 ? 's' : '' }}</span>
                                                @if($property->parking)
                                                    <span>Parking</span>
                                                @endif
                                            </p>
                                            <p>
                                                <a class="btn btn-primary btn-lg" href="{{ route('properties.show', $property->slug) }}">Learn More</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <li style="background-image: url('{{ asset('1n-west/images/cover_bg_1.jpg') }}')">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
                                    <div class="slider-text-inner">
                                        <div class="desc">
                                            <span class="status">{{ setting('site_tagline', 'Welcome') }}</span>
                                            <h1>{{ setting('site_name', '1N-West') }}</h1>
                                            <p>New properties are being added. Browse our listings or talk to the team about availability.</p>
                                            <p>
                                                <a class="btn btn-primary btn-lg" href="{{ route('properties') }}">View Properties</a>
                                                <a class="btn btn-default btn-lg" href="{{ route('contact') }}">Contact Us</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
    </aside>
@else
    @php
        $pageTitle = $pageTitle ?? 'Properties';
        $breadcrumbLinks = $breadcrumbLinks ?? [
            'DescriptionOne' => 'View our',
            'DescriptionTwo' => 'apartments',
            'url' => route('properties'),
            'label' => 'apartments',
        ];
    @endphp
    <aside id="fh5co-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url('{{ asset('1n-west/images/img_bg_3.jpg') }}');">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <h2 class="heading-title">{{ $pageTitle }}</h2>
                                    <p class="fh5co-lead">{{ $breadcrumbLinks['DescriptionOne'] }} <i class="icon-heart3"></i> {{ $breadcrumbLinks['DescriptionTwo'] }}
                                        <a href="{{ $breadcrumbLinks['url'] }}">{{ $breadcrumbLinks['label'] }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
@endif
