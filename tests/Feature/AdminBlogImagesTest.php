<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Blog;
use App\Models\BlogImages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBlogImagesTest extends TestCase
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

    public function test_blog_images_index_requires_auth()
    {
        $response = $this->get('/admin/blog-images');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_blog_images()
    {
        $admin = $this->admin();
        $blog = Blog::factory()->create();
        BlogImages::factory()->create(['blog_id' => $blog->id]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/blog-images');

        $response->assertStatus(200);
        $response->assertViewIs('admin.blog-images.index');
    }

    public function test_admin_can_create_blog_image()
    {
        $admin = $this->admin();
        $blog = Blog::factory()->create();

        $response = $this->actingAs($admin, 'admin')->post('/admin/blog-images', [
            'blog_id' => $blog->id,
            'image_path' => 'blog-1.jpg',
        ]);

        $response->assertRedirect(route('admin.blog-images.index'));
        $this->assertDatabaseHas('blog_images', ['image_path' => 'blog-1.jpg']);
    }

    public function test_blog_image_store_validation_requires_fields()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/blog-images', []);

        $response->assertSessionHasErrors(['blog_id', 'image_path']);
    }

    public function test_admin_can_delete_blog_image()
    {
        $admin = $this->admin();
        $blog = Blog::factory()->create();
        $image = BlogImages::factory()->create(['blog_id' => $blog->id]);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/blog-images/' . $image->id);

        $response->assertRedirect(route('admin.blog-images.index'));
        $this->assertDatabaseMissing('blog_images', ['id' => $image->id]);
    }
}
