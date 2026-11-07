@php
    $siteName = setting('site_name', config('app.name', '1N-West'));
    $socials = [
        'twitter' => ['key' => 'social_twitter', 'icon' => 'icon-twitter2', 'label' => 'Twitter'],
        'facebook' => ['key' => 'social_facebook', 'icon' => 'icon-facebook2', 'label' => 'Facebook'],
        'instagram' => ['key' => 'social_instagram', 'icon' => 'icon-instagram', 'label' => 'Instagram'],
        'linkedin' => ['key' => 'social_linkedin', 'icon' => 'icon-linkedin', 'label' => 'LinkedIn'],
        'youtube' => ['key' => 'social_youtube', 'icon' => 'icon-youtube', 'label' => 'YouTube'],
        'dribbble' => ['key' => 'social_dribbble', 'icon' => 'icon-dribbble2', 'label' => 'Dribbble'],
    ];
    $activeSocials = collect($socials)->filter(fn ($social) => setting($social['key']));
@endphp
<footer>
    <div id="footer">
        <div class="container">
            <div class="row row-bottom-padded-md">
                <div class="col-md-3">
                    <h3 class="section-title">About {{ $siteName }}</h3>
                    <p>
                        {{ setting('footer_about', 'Welcome to ' . $siteName . ', where comfort meets convenience.') }}
                    </p>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <h3 class="section-title">Links</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('properties') }}">Properties</a></li>
                        <li><a href="{{ route('agent') }}">Agent</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        @if (setting_link('footer_faq_url'))
                            <li><a href="{{ setting_link('footer_faq_url') }}">FAQ</a></li>
                        @endif
                    </ul>
                </div>

                <div class="col-md-3">
                    <h3 class="section-title">Information</h3>
                    <ul>
                        @if (setting_link('footer_terms_url'))
                            <li><a href="{{ setting_link('footer_terms_url') }}">Terms &amp; Condition</a></li>
                        @endif
                        @if (setting_link('footer_license_url'))
                            <li><a href="{{ setting_link('footer_license_url') }}">License</a></li>
                        @endif
                        @if (setting_link('footer_privacy_url'))
                            <li><a href="{{ setting_link('footer_privacy_url') }}">Privacy &amp; Policy</a></li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="section-title">{{ setting('newsletter_heading', 'Newsletter') }}</h3>
                    <p>{{ setting('newsletter_text', 'Subscribe for our newsletter') }}</p>
                    <form class="form-inline" id="fh5co-header-subscribe" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="name" value="Newsletter Subscriber">
                        <input type="hidden" name="subject" value="Newsletter subscription">
                        <input type="hidden" name="message" value="Please subscribe this email to the newsletter.">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required />
                                    <button type="submit" class="btn btn-default" title="Subscribe">
                                        <i class="icon-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="fh5co-social-icons">
                        @forelse ($activeSocials as $social)
                            <a href="{{ setting($social['key']) }}" target="_blank" rel="noopener noreferrer"
                                title="{{ $social['label'] }}"><i class="{{ $social['icon'] }}"></i></a>
                        @empty
                            <span class="text-muted">Social profiles coming soon.</span>
                        @endforelse
                    </p>
                    <p>
                        Copyright {{ now()->year }}
                        <a href="{{ route('home') }}">{{ setting('footer_copyright', $siteName) }}</a>.
                        All Rights Reserved. <br />Made with <i class="icon-heart3"></i> by
                        <a href="{{ setting_link('footer_credit_url', 'https://jke.co.ke') }}" target="_blank" rel="noopener noreferrer">
                            {{ setting('footer_credit_name', 'jke') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
