{{-- Property cards are shown on the home and listing pages. --}}
<div id="fh5co-properties" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Apartments</h3>
                <p>
                    Have an online view of the apartment before booking a viewing.
                </p>
            </div>
        </div>
        <div class="row">
            @forelse ($properties ?? [] as $property)
                <div class="col-md-4 animate-box">
                    <div class="property">
                        <a href="{{ route('properties.show', $property->slug) }}" class="fh5co-property"
                            style="background-image: url('{{ property_image_url($property->meta_image) }}')">
                            @if ($property->promotion)
                                <span class="status">Featured</span>
                            @elseif ($property->price > 0)
                                <span class="status">For Rent</span>
                            @endif
                            <ul class="list-details">
                                <li>{{ $property->rooms }} Bedroom{{ $property->rooms > 1 ? 's' : '' }}</li>
                                <li>{{ $property->baths }} Bathroom{{ $property->baths > 1 ? 's' : '' }}</li>
                                @if ($property->parking)
                                    <li>Parking</li>
                                @endif
                            </ul>
                        </a>
                        <div class="property-details">
                            <h3>{{ $property->name }}</h3>
                            <span class="price">Ksh {{ number_format($property->price) }}</span>
                            <p>{{ \Illuminate\Support\Str::limit($property->meta_description, 100) }}</p>
                            <span class="address"><i class="icon-map"></i>{{ collect([$property->town, $property->county])->filter()->implode(', ') ?: 'Location not provided' }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center animate-box">
                    <div class="property">
                        <div class="property-details">
                            <h3>No properties available yet</h3>
                            <p class="mb-3">Our listings are being updated. Please check back soon.</p>
                            <a class="btn btn-primary" href="{{ route('contact') }}">Ask about availability</a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        @if (isset($properties) && method_exists($properties, 'links'))
            <div class="text-center mt-4">
                {{ $properties->links() }}
            </div>
        @endif
    </div>
</div>
