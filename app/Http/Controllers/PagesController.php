<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function agent()
    {
        $pageTitle = 'Our Agent';
        $breadcrumbLinks = [
            'DescriptionOne' => 'Meet our agents',
            'DescriptionTwo' => 'by the fine folks at',
            'url' => '/under_construction',
            'label' => 'Home',
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
            'url' => '/under_construction',
            'label' => 'Home',
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
            'url' => '/under_construction',
            'label' => 'Home',
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
        $pageTitle = 'Our Properties';
        $breadcrumbLinks = [
            'DescriptionOne' => 'You will',
            'DescriptionTwo' => 'Our other properties',
            'url' => '/under_construction',
            'label' => 'Home',
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
