<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Http\Request;

class BlogImagesController extends Controller
{
    public function index()
    {
        $images = BlogImages::with('blog')->latest()->paginate(10);

        return view('admin.blog-images.index', compact('images'));
    }

    public function create()
    {
        $blogs = Blog::all();

        return view('admin.blog-images.create', compact('blogs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'image_path' => 'required|string|max:255',
        ]);

        BlogImages::create($validated);

        return redirect()
            ->route('admin.blog-images.index')
            ->with('success', 'Blog image created successfully.');
    }

    public function show(BlogImages $blogImage)
    {
        $blogImage->load('blog');

        return view('admin.blog-images.show', compact('blogImage'));
    }

    public function edit(BlogImages $blogImage)
    {
        $blogs = Blog::all();

        return view('admin.blog-images.edit', compact('blogImage', 'blogs'));
    }

    public function update(Request $request, BlogImages $blogImage)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'image_path' => 'required|string|max:255',
        ]);

        $blogImage->update($validated);

        return redirect()
            ->route('admin.blog-images.index')
            ->with('success', 'Blog image updated successfully.');
    }

    public function destroy(BlogImages $blogImage)
    {
        $blogImage->delete();

        return redirect()
            ->route('admin.blog-images.index')
            ->with('success', 'Blog image deleted successfully.');
    }
}
