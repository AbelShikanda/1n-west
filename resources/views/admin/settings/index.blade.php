@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">
            <div class="row align-items-center mb-2">
                <div class="col">
                    <h2 class="h5 page-title">Site Settings</h2>
                    <p class="text-muted small mb-0">These values power the public header, contact page and footer.</p>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('settings.update') }}" method="POST">
                @csrf
                @method('PUT')

                @php
                    $value = fn ($key, $default = '') => old('settings.' . $key, optional($settings->get($key))->value ?? $default);
                    $field = function ($key, $label, $type = 'text', $placeholder = '') use ($value) {
                        return [$key, $label, $type, $placeholder];
                    };
                    $groups = [
                        'General' => [
                            ['site_name', 'Site name', 'text'],
                            ['site_tagline', 'Tagline', 'text'],
                            ['footer_about', 'About text', 'textarea'],
                        ],
                        'Contact details' => [
                            ['contact_address', 'Address', 'text'],
                            ['contact_phone', 'Phone', 'text'],
                            ['contact_email', 'Email', 'email'],
                            ['contact_website', 'Website', 'url'],
                        ],
                        'Social media' => [
                            ['social_twitter', 'Twitter / X', 'url'],
                            ['social_facebook', 'Facebook', 'url'],
                            ['social_instagram', 'Instagram', 'url'],
                            ['social_linkedin', 'LinkedIn', 'url'],
                            ['social_youtube', 'YouTube', 'url'],
                            ['social_dribbble', 'Dribbble', 'url'],
                        ],
                        'Footer & newsletter' => [
                            ['footer_copyright', 'Copyright owner', 'text'],
                            ['footer_credit_name', 'Credit name', 'text'],
                            ['footer_credit_url', 'Credit URL', 'url'],
                            ['newsletter_heading', 'Newsletter heading', 'text'],
                            ['newsletter_text', 'Newsletter text', 'text'],
                            ['footer_faq_url', 'FAQ link', 'text'],
                            ['footer_terms_url', 'Terms link', 'text'],
                            ['footer_privacy_url', 'Privacy link', 'text'],
                            ['footer_license_url', 'License link', 'text'],
                        ],
                    ];
                @endphp

                @foreach($groups as $group => $fields)
                    <div class="card shadow mb-4">
                        <div class="card-header"><strong>{{ $group }}</strong></div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($fields as [$key, $label, $type])
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="setting-{{ $key }}">{{ $label }}</label>
                                        @if($type === 'textarea')
                                            <textarea id="setting-{{ $key }}" name="settings[{{ $key }}]" class="form-control" rows="3">{{ $value($key) }}</textarea>
                                        @else
                                            <input id="setting-{{ $key }}" type="{{ $type }}" name="settings[{{ $key }}]" class="form-control" value="{{ $value($key) }}">
                                        @endif
                                        <small class="text-muted">Key: <code>{{ $key }}</code></small>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mb-5">
                    <button type="submit" class="btn btn-primary">Save settings</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary" target="_blank">View site</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
