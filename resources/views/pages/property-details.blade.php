@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="property-detail animate-box">
                    <div class="fh5co-property"
                         style="background-image: url('{{ asset('1n-west/images/' . $property->meta_image) }}')">
                        @if ($property->promotion)
                            <span class="status">Featured</span>
                        @elseif ($property->price > 0)
                            <span class="status">For Rent</span>
                        @endif
                        <ul class="list-details">
                            <li>{{ $property->rooms }} Bedroom{{ $property->rooms > 1 ? 's' : '' }}</li>
                            <li>{{ $property->baths }} Bathroom{{ $property->baths > 1 ? 's' : '' }}</li>
                            <li>{{ $property->living_rooms }} Living Room{{ $property->living_rooms > 1 ? 's' : '' }}</li>
                            <li>{{ $property->kitchens }} Kitchen{{ $property->kitchens > 1 ? 's' : '' }}</li>
                        </ul>
                    </div>
                    <div class="property-details">
                        <h3>{{ $property->name }}</h3>
                        <span class="price">Ksh {{ number_format($property->price) }}</span>
                        <p>{{ $property->meta_description }}</p>
                        <span class="address"><i class="icon-map"></i>{{ $property->town }}, {{ $property->county }}, {{ $property->country }}</span>

                        <div class="contact-links mt-4">
                            <h4>Contact</h4>
                            @if ($property->whatsapp)
                                <a href="https://wa.me/{{ $property->whatsapp }}" target="_blank" class="btn btn-primary">
                                    <i class="icon-whatsapp"></i> WhatsApp
                                </a>
                            @endif
                            @if ($property->telegram)
                                <a href="https://t.me/{{ $property->telegram }}" target="_blank" class="btn btn-secondary">
                                    <i class="icon-paper-plane"></i> Telegram
                                </a>
                            @endif
                            @if ($property->website)
                                <a href="{{ $property->website }}" target="_blank" class="btn btn-info">
                                    <i class="icon-globe2"></i> Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-sidebar animate-box">
                    <h3>Property Details</h3>
                    <ul class="property-info">
                        <li><strong>Category:</strong> {{ $property->category->name }}</li>
                        <li><strong>Type:</strong> {{ $property->type->name }}</li>
                        <li><strong>Price:</strong> Ksh {{ number_format($property->price) }}</li>
                        <li><strong>Rooms:</strong> {{ $property->rooms }}</li>
                        <li><strong>Bathrooms:</strong> {{ $property->baths }}</li>
                        <li><strong>Living Rooms:</strong> {{ $property->living_rooms }}</li>
                        <li><strong>Kitchens:</strong> {{ $property->kitchens }}</li>
                        <li><strong>Location:</strong> {{ $property->town }}, {{ $property->county }}, {{ $property->country }}</li>
                        <li><strong>Parking:</strong> {{ $property->parking ? 'Yes' : 'No' }}</li>
                        <li><strong>Promotion:</strong> {{ $property->promotion ? 'Yes' : 'No' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
