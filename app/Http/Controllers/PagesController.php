<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Blog;

class PagesController extends Controller
{
    public function agent()
    {
        $staff = Admin::where('is_staff', 1)->get();
        $pageTitle = 'Our Staff';
        $breadcrumbLinks = [
            'DescriptionOne' => 'Meet our staff',
            'DescriptionTwo' => 'by the fine folks at',
            'url' => '/agent',
            'label' => 'staff',
        ];
        return view(
            'pages.agent',
            with([
                'staff' => $staff,
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
    }

    public function blog()
    {
        $blogs = Blog::with('category')->latest()->paginate(6);
        $pageTitle = 'Our Blogs';
        $breadcrumbLinks = [
            'DescriptionOne' => 'Develop a',
            'DescriptionTwo' => 'for reading',
            'url' => '/blog',
            'label' => 'blog',
        ];
        return view(
            'pages.blog',
            with([
                'blogs' => $blogs,
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
    }

    public function show($slug)
    {
        $blog = Blog::with('category', 'images')->where('slug', $slug)->firstOrFail();

        return view('pages.blog-detail', compact('blog'));
    }

    public function contact()
    {
        $pageTitle = 'Contact Us';
        $breadcrumbLinks = [
            'DescriptionOne' => 'We alway',
            'DescriptionTwo' => 'to talk to our customers',
            'url' => '/contact',
            'label' => 'contact',
        ];
        return view(
            'pages.contact',
            with([
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
    }

    public function properties()
    {
        $pageTitle = 'View Apartments';
        $breadcrumbLinks = [
            'DescriptionOne' => 'You will',
            'DescriptionTwo' => 'Our other apartments',
            'url' => '/properties',
            'label' => 'apartments',
        ];
        return view(
            'pages.properties',
            with([
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
    }
}
