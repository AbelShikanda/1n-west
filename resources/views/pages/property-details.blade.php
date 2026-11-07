@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    @php
        $categoryName = $property->category?->name ?? 'Uncategorized';
        $typeName = $property->type?->name ?? 'Unspecified';
        $whatsappNumber = preg_replace('/\D+/', '', (string) setting('contact_phone', ''));
        $telegramHandle = ltrim((string) setting('contact_telegram', ''), '@');
        $gallery = $property->images->whereNotNull('image_path');
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="property-detail animate-box">
                    <div class="fh5co-property"
                         style="background-image: url('{{ property_image_url($property->meta_image) }}')">
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
                        <p>{{ $property->meta_description ?: 'No description has been provided for this property yet.' }}</p>
                        <span class="address"><i class="icon-map"></i>{{ collect([$property->town, $property->county, $property->country])->filter()->implode(', ') ?: 'Location not provided' }}</span>

                        <div class="contact-links mt-4">
                            <h4>Contact</h4>
                            @if ($property->whatsapp && $whatsappNumber)
                                <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                                    <i class="icon-whatsapp"></i> WhatsApp
                                </a>
                            @endif
                            @if ($property->telegram && $telegramHandle)
                                <a href="https://t.me/{{ $telegramHandle }}" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                                    <i class="icon-paper-plane"></i> Telegram
                                </a>
                            @endif
                            @if ($property->website && setting_link('contact_website'))
                                <a href="{{ setting_link('contact_website') }}" target="_blank" rel="noopener noreferrer" class="btn btn-info">
                                    <i class="icon-globe2"></i> Website
                                </a>
                            @endif
                            @if (! $property->whatsapp && ! $property->telegram && ! $property->website)
                                <p class="text-muted">Contact our team through the <a href="{{ route('contact') }}">contact page</a>.</p>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($gallery->isNotEmpty())
                    <div class="mt-4 animate-box">
                        <h3>Gallery</h3>
                        <div class="row">
                            @foreach ($gallery as $image)
                                <div class="col-md-4 mb-3">
                                    <img class="img-responsive" src="{{ property_image_url($image->image_path) }}"
                                        alt="{{ $property->name }} image" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-md-4">
                <div class="property-sidebar animate-box">
                    <h3>Property Details</h3>
                    <ul class="property-info">
                        <li><strong>Category:</strong> {{ $categoryName }}</li>
                        <li><strong>Type:</strong> {{ $typeName }}</li>
                        <li><strong>Price:</strong> Ksh {{ number_format($property->price) }}</li>
                        <li><strong>Rooms:</strong> {{ $property->rooms }}</li>
                        <li><strong>Bathrooms:</strong> {{ $property->baths }}</li>
                        <li><strong>Living Rooms:</strong> {{ $property->living_rooms }}</li>
                        <li><strong>Kitchens:</strong> {{ $property->kitchens }}</li>
                        <li><strong>Location:</strong> {{ collect([$property->town, $property->county, $property->country])->filter()->implode(', ') ?: 'Not provided' }}</li>
                        <li><strong>Parking:</strong> {{ $property->parking ? 'Yes' : 'No' }}</li>
                        <li><strong>Promotion:</strong> {{ $property->promotion ? 'Yes' : 'No' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
