<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_page_loads()
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertViewIs('pages.blog');
    }

    public function test_blog_page_shows_blog_posts()
    {
        $category = BlogCategories::factory()->create(['name' => 'Market News', 'slug' => 'market-news']);
        Blog::factory()->count(3)->create([
            'category_id' => $category->id,
        ]);

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertViewIs('pages.blog');
    }

    public function test_blog_page_shows_empty_state_when_no_posts()
    {
        Blog::query()->delete();

        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('No blog posts available');
    }

    public function test_blog_detail_page_loads()
    {
        $category = BlogCategories::factory()->create(['name' => 'Market News', 'slug' => 'market-news']);
        $blog = Blog::factory()->create([
            'category_id' => $category->id,
            'title' => 'Test Blog Post',
            'slug' => 'test-blog-post',
        ]);

        $response = $this->get('/blog/test-blog-post');

        $response->assertStatus(200);
        $response->assertViewIs('pages.blog-detail');
        $response->assertViewHas('blog', function ($b) use ($blog) {
            return $b->id === $blog->id;
        });
    }

    public function test_blog_detail_404_for_nonexistent_slug()
    {
        $response = $this->get('/blog/nonexistent-slug');

        $response->assertStatus(404);
    }
}
