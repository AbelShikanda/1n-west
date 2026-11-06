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
            @if (isset($properties) && $properties->count() > 0)
                @foreach ($properties as $property)
                    <div class="col-md-4 animate-box">
                        <div class="property">
                            <a href="{{ route('properties.show', $property->slug) }}" class="fh5co-property"
                                style="background-image: url('{{ asset('1n-west/images/' . $property->meta_image) }}')">
                                @if ($property->promotion)
                                    <span class="status">Featured</span>
                                @else
                                    <span class="status">For Rent</span>
                                @endif
                                <ul class="list-details">
                                    <li>{{ $property->rooms }} Bedroom{{ $property->rooms > 1 ? 's' : '' }}</li>
                                    <li>{{ $property->baths }} Bathroom{{ $property->baths > 1 ? 's' : '' }}</li>
                                    <li>Parking</li>
                                </ul>
                            </a>
                            <div class="property-details">
                                <h3>{{ $property->name }}</h3>
                                <span class="price">Ksh {{ number_format($property->price) }}</span>
                                <p>{{ $property->meta_description }}</p>
                                <span class="address"><i class="icon-map"></i>{{ $property->town }}, {{ $property->county }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- ----------------------------------------------------- -->
                <div class="col-md-4 animate-box">
                    <div class="property">
                        <a href="{{ route('underConstruction') }}" class="fh5co-property"
                            style="background-image: url('{{ asset('1n-west/images/property-1.jpg') }}')">
                            <span class="status">Rent</span>
                            <ul class="list-details">
                                <li>Spacious</li>
                                <li></li>
                                <li>5 Bedroom:</li>
                                <li>4 Bathroom:</li>
                                <li>parking:</li>
                            </ul>
                        </a>
                        <div class="property-details">
                            <h3>Properties Near in Mall</h3>
                            <span class="price">Ksh 50,000</span>
                            <p>
                                This 3-bedroom, 2-bathroom house is available for
                                rent in a quiet and secure neighborhood
                            </p>
                            <span class="address"><i class="icon-map"></i>Kenyatta Dr8. Nairobi, 00100 NBO, KEN</span>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------- -->
            @endif
        </div>
    </div>
</div>
