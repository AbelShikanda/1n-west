@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="fh5co-blog animate-box">
                    <img class="img-responsive"
                         src="{{ property_image_url($blog->featured_image, 'https://placehold.co/800x450/e9ecef/495057?text=1N-West+Blog') }}"
                         alt="{{ $blog->title }}" />
                    <div class="blog-text">
                        <div class="prod-title">
                            <h3>{{ $blog->title }}</h3>
                            <span class="posted_by">
                                {{ $blog->category?->name ?? 'Uncategorized' }}
                                @if ($blog->created_at)
                                    · {{ $blog->created_at->format('M. d, Y') }}
                                @endif
                            </span>
                            <p>{!! nl2br(e($blog->content ?: 'This article is being written. Please check back soon.')) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-sidebar animate-box">
                    <h3>Blog Details</h3>
                    <ul class="property-info">
                        <li><strong>Category:</strong> {{ $blog->category?->name ?? 'Uncategorized' }}</li>
                        <li><strong>Posted:</strong> {{ $blog->created_at?->format('M. d, Y') ?? 'Not dated' }}</li>
                    </ul>
                    <a class="btn btn-primary" href="{{ route('blog') }}">Back to blog</a>
                </div>
            </div>
        </div>
    </div>
@endsection
