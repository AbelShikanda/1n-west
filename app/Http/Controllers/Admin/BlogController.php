<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::with('category');

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));
            $query->where('title', 'like', "%{$search}%");
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->integer('category'));
        }

        $blogs = $query->latest()->paginate(10)->withQueryString();
        $categories = BlogCategories::orderBy('name')->get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategories::all();

        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
        ]);

        Blog::create($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog article created successfully.');
    }

    public function show(Blog $blog)
    {
        $blog->load('category', 'images');

        return view('admin.blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        $categories = BlogCategories::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
        ]);

        $blog->update($validated);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog article updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog article deleted successfully.');
    }
}
