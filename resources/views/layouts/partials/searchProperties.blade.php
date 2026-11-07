@auth
    @php
        $searchCategories = $searchCategories ?? \App\Models\PropertyCategories::query()->orderBy('name')->get();
        $searchTypes = $searchTypes ?? \App\Models\PropertyTypes::query()->orderBy('name')->get();
    @endphp
    <div id="fh5co-search-map">
        <div class="search-property">
            <div class="s-holder">
                <h2>Search Properties</h2>
                <form action="{{ route('properties') }}" method="GET">
                    <div class="row">
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-keyword">Keyword:</label>
                                <input type="text" class="form-control" id="search-keyword" name="search"
                                    value="{{ request('search') }}" placeholder="Any" />
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-category">Category:</label>
                                <select class="form-control" id="search-category" name="category">
                                    <option value="">Any</option>
                                    @foreach ($searchCategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ (string) request('category') === (string) $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-type">Property Type:</label>
                                <select class="form-control" id="search-type" name="type">
                                    <option value="">Any</option>
                                    @foreach ($searchTypes as $type)
                                        <option value="{{ $type->id }}"
                                            {{ (string) request('type') === (string) $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-location">Location:</label>
                                <input type="text" class="form-control" id="search-location" name="location"
                                    value="{{ request('location') }}" placeholder="Town, county or country" />
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-min-price">Min Price (Ksh):</label>
                                <input type="number" min="0" step="1000" class="form-control" id="search-min-price"
                                    name="min_price" value="{{ request('min_price') }}" placeholder="Any" />
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-max-price">Max Price (Ksh):</label>
                                <input type="number" min="0" step="1000" class="form-control" id="search-max-price"
                                    name="max_price" value="{{ request('max_price') }}" placeholder="Any" />
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-rooms">Bedrooms:</label>
                                <select class="form-control" id="search-rooms" name="rooms">
                                    <option value="">Any</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ (string) request('rooms') === (string) $i ? 'selected' : '' }}>
                                            {{ $i }}{{ $i === 5 ? '+' : '' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-baths">Bathrooms:</label>
                                <select class="form-control" id="search-baths" name="baths">
                                    <option value="">Any</option>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ (string) request('baths') === (string) $i ? 'selected' : '' }}>
                                            {{ $i }}{{ $i === 5 ? '+' : '' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12">
                            <div class="input-field">
                                <label for="search-parking">Parking:</label>
                                <select class="form-control" id="search-parking" name="parking">
                                    <option value="">Any</option>
                                    <option value="1" {{ request('parking') === '1' ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxs-12 col-xs-12 text-center">
                            <p>
                                <button type="submit" class="btn btn-primary btn-lg">Search</button>
                                <a class="btn btn-default btn-lg" href="{{ route('properties') }}">Reset</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="map" style="background-image: url('{{ asset('1n-west/images/cover_bg_1.jpg') }}')"></div>
    </div>
@endauth
