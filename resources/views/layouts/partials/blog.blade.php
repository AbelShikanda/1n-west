@php
    $blogs = \App\Models\Blog::latest()->take(3)->get();
@endphp
<div id="fh5co-blog-section" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Recent From Blog</h3>
                <p>
                    Stay updated with the latest insights, tips, and trends in the world of real estate.
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-bottom-padded-md">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="fh5co-blog animate-box">
                        <a href="#"><img class="img-responsive" src="{{ asset('1n-west/images/property-4.jpg') }}"
                                alt="" /></a>
                        <div class="blog-text">
                            <div class="prod-title">
                                <h3><a href="{{ route('underConstruction') }}">{{ $blog->title }}</a></h3>
                                <span class="posted_by">{{ $blog->created_at?->format('M. d') }}</span>
                                <p>{{ \Illuminate\Support\Str::limit($blog->content, 120) }}</p>
                                <p><a href="{{ route('underConstruction') }}">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
