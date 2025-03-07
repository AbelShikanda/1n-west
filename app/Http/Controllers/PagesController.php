<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function agent()
    {
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
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
    }

    public function blog()
    {
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
                'pageTitle' => $pageTitle,
                'breadcrumbLinks' => $breadcrumbLinks,
            ]),
        );
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
