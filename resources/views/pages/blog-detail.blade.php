@extends('layouts.app')

@section('content')
    @include('layouts.partials.aside')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="fh5co-blog animate-box">
                    @if ($blog->featured_image)
                        <a href="#"><img class="img-responsive"
                                         src="{{ asset('1n-west/images/' . $blog->featured_image) }}"
                                         alt="{{ $blog->title }}" /></a>
                    @endif
                    <div class="blog-text">
                        <div class="prod-title">
                            <h3>{{ $blog->title }}</h3>
                            @if ($blog->category)
                                <span class="posted_by">{{ $blog->category->name }} · {{ $blog->created_at?->format('M. d, Y') }}</span>
                            @else
                                <span class="posted_by">{{ $blog->created_at?->format('M. d, Y') }}</span>
                            @endif
                            <p>{!! nl2br(e(\Illuminate\Support\Str::limit($blog->content, 600))) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="property-sidebar animate-box">
                    <h3>Blog Details</h3>
                    <ul class="property-info">
                        <li><strong>Category:</strong> {{ $blog->category->name ?? 'Uncategorized' }}</li>
                        <li><strong>Posted:</strong> {{ $blog->created_at?->format('M. d, Y') }}</li>
                        <li><strong>Slug:</strong> {{ $blog->slug }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
