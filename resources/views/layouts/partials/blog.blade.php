@php
    $blogPosts = isset($blogs) ? $blogs : collect();
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
            @forelse ($blogPosts as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="fh5co-blog animate-box">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img class="img-responsive"
                                 src="{{ property_image_url($blog->featured_image, 'https://placehold.co/600x400/e9ecef/495057?text=1N-West+Blog') }}"
                                 alt="{{ $blog->title }}" />
                        </a>
                        <div class="blog-text">
                            <div class="prod-title">
                                <h3><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a></h3>
                                @if ($blog->category)
                                    <span class="posted_by">{{ $blog->category->name }} · {{ $blog->created_at?->format('M. d') }}</span>
                                @else
                                    <span class="posted_by">{{ $blog->created_at?->format('M. d') }}</span>
                                @endif
                                <p>{{ \Illuminate\Support\Str::limit($blog->content ?: 'Read this article on our blog.', 120) }}</p>
                                <p><a href="{{ route('blog.show', $blog->slug) }}">Learn More...</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center animate-box">
                    <div class="property">
                        <div class="property-details">
                            <h3>No blog posts available</h3>
                            <p>Check back soon for our latest insights.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        @if (method_exists($blogs, 'links'))
            <div class="text-center mt-4">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>
