<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBlogsTest extends TestCase
{
    use RefreshDatabase;

    protected function admin()
    {
        return Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);
    }

    public function test_blogs_index_requires_auth()
    {
        $response = $this->get('/admin/blogs');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_blogs()
    {
        $admin = $this->admin();
        BlogCategories::factory()->create(['name' => 'News', 'slug' => 'news']);
        Blog::factory()->create([
            'category_id' => BlogCategories::first()->id,
            'title' => 'Test Article',
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/blogs');

        $response->assertStatus(200);
        $response->assertViewIs('admin.blogs.index');
    }

    public function test_admin_can_create_blog()
    {
        $admin = $this->admin();
        BlogCategories::factory()->create(['name' => 'News', 'slug' => 'news']);

        $response = $this->actingAs($admin, 'admin')->post('/admin/blogs', [
            'category_id' => BlogCategories::first()->id,
            'title' => 'New Article',
            'slug' => 'new-article',
            'content' => 'Article content here.',
        ]);

        $response->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseHas('blogs', ['title' => 'New Article']);
    }

    public function test_blog_store_validation_requires_fields()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/blogs', []);

        $response->assertSessionHasErrors(['category_id', 'title', 'content']);
    }

    public function test_admin_can_delete_blog()
    {
        $admin = $this->admin();
        BlogCategories::factory()->create(['name' => 'News', 'slug' => 'news']);
        $blog = Blog::factory()->create([
            'category_id' => BlogCategories::first()->id,
        ]);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/blogs/' . $blog->id);

        $response->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }
}
