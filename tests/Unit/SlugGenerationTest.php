<?php

namespace Tests\Unit;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SlugGenerationTest extends TestCase
{
    use RefreshDatabase;

    public function test_property_type_slug_generated_from_name()
    {
        $type = PropertyTypes::create(['name' => 'Luxury Villa']);
        $this->assertSame('luxury-villa', $type->slug);
    }

    public function test_property_category_slug_generated_from_name()
    {
        $category = PropertyCategories::create(['name' => 'Short Term Rental']);
        $this->assertSame('short-term-rental', $category->slug);
    }

    public function test_blog_category_slug_generated_from_name()
    {
        $category = BlogCategories::create(['name' => 'Market News']);
        $this->assertSame('market-news', $category->slug);
    }

    public function test_blog_slug_generated_from_title()
    {
        $category = BlogCategories::create(['name' => 'News']);
        $blog = Blog::create([
            'category_id' => $category->id,
            'title' => 'Buying in Nairobi 2026',
            'content' => 'Content',
        ]);
        $this->assertSame('buying-in-nairobi-2026', $blog->slug);
    }
}
