<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\BlogCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogCategoriesTest extends TestCase
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

    public function test_unauthenticated_redirected_to_login()
    {
        $response = $this->get('/admin/blog-categories');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_crud_blog_category()
    {
        $admin = $this->admin();

        $this->actingAs($admin, 'admin')->get('/admin/blog-categories')->assertStatus(200);

        $this->actingAs($admin, 'admin')->post('/admin/blog-categories', [
            'name' => 'Market News',
        ])->assertRedirect(route('blog-categories.index'));

        $category = BlogCategories::where('name', 'Market News')->firstOrFail();
        $this->assertNotEmpty($category->slug);

        $this->actingAs($admin, 'admin')->put('/admin/blog-categories/' . $category->id, [
            'name' => 'Market Updates',
        ])->assertRedirect(route('blog-categories.index'));

        $this->assertDatabaseHas('blog_categories', ['id' => $category->id, 'name' => 'Market Updates']);

        $this->actingAs($admin, 'admin')->delete('/admin/blog-categories/' . $category->id)
            ->assertRedirect(route('blog-categories.index'));

        $this->assertDatabaseMissing('blog_categories', ['id' => $category->id]);
    }
}
