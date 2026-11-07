@php
    $property = $property ?? null;
    $value = fn ($field, $default = null) => old($field, $property?->{$field} ?? $default);
@endphp

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $value('name') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Slug (optional)</label>
        <input type="text" name="slug" class="form-control" value="{{ $value('slug') }}" placeholder="Generated from name">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Category</label>
        <select name="categories_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (string) $value('categories_id') === (string) $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Type</label>
        <select name="types_id" class="form-select" required>
            @foreach($types as $type)
                <option value="{{ $type->id }}" {{ (string) $value('types_id') === (string) $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Price (Ksh)</label>
        <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ $value('price') }}" required>
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Bedrooms</label>
        <input type="number" min="0" name="rooms" class="form-control" value="{{ $value('rooms', 1) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Bathrooms</label>
        <input type="number" min="0" name="baths" class="form-control" value="{{ $value('baths', 1) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Living rooms</label>
        <input type="number" min="0" name="living_rooms" class="form-control" value="{{ $value('living_rooms', 1) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Kitchens</label>
        <input type="number" min="0" name="kitchens" class="form-control" value="{{ $value('kitchens', 1) }}">
    </div>
    <div class="col-md-4 mb-3">
        <label class="form-label">Country</label>
        <input type="text" name="country" class="form-control" value="{{ $value('country', 'Kenya') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">County</label>
        <input type="text" name="county" class="form-control" value="{{ $value('county') }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Town</label>
        <input type="text" name="town" class="form-control" value="{{ $value('town') }}" required>
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label">Meta description</label>
        <textarea name="meta_description" class="form-control" rows="3">{{ $value('meta_description') }}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Meta keywords</label>
        <input type="text" name="meta_keywords" class="form-control" value="{{ $value('meta_keywords') }}">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Image path or URL</label>
        <input type="text" name="meta_image" class="form-control" value="{{ $value('meta_image') }}"
            placeholder="property-1.jpg or https://...">
        <small class="text-muted">Leave blank to use the placeholder image.</small>
    </div>
    <div class="col-md-12 mb-3">
        <div class="form-check form-check-inline">
            <input type="checkbox" name="parking" value="1" class="form-check-input" id="parking" {{ $value('parking') ? 'checked' : '' }}>
            <label class="form-check-label" for="parking">Parking</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="promotion" value="1" class="form-check-input" id="promotion" {{ $value('promotion') ? 'checked' : '' }}>
            <label class="form-check-label" for="promotion">Featured / promotion</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="whatsapp" value="1" class="form-check-input" id="whatsapp" {{ $value('whatsapp') ? 'checked' : '' }}>
            <label class="form-check-label" for="whatsapp">Enable WhatsApp contact</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="telegram" value="1" class="form-check-input" id="telegram" {{ $value('telegram') ? 'checked' : '' }}>
            <label class="form-check-label" for="telegram">Enable Telegram contact</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" name="website" value="1" class="form-check-input" id="website" {{ $value('website') ? 'checked' : '' }}>
            <label class="form-check-label" for="website">Enable website contact</label>
        </div>
    </div>
</div>
