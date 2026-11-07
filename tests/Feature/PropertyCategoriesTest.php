<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\PropertyCategories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyCategoriesTest extends TestCase
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
        $response = $this->get('/admin/property-categories');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_index_loads_for_admin()
    {
        $admin = $this->admin();
        PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);

        $response = $this->actingAs($admin, 'admin')->get('/admin/property-categories');

        $response->assertStatus(200);
        $response->assertViewIs('admin.property-categories.index');
    }

    public function test_store_creates_category()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-categories', [
            'name' => 'Commercial',
        ]);

        $response->assertRedirect(route('property-categories.index'));
        $this->assertDatabaseHas('property_categories', ['name' => 'Commercial']);
    }

    public function test_store_validation_requires_name()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-categories', []);

        $response->assertSessionHasErrors('name');
    }

    public function test_destroy_deletes_category()
    {
        $admin = $this->admin();
        $category = PropertyCategories::factory()->create(['name' => 'ToDelete', 'slug' => 'todelete']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/property-categories/' . $category->id);

        $response->assertRedirect(route('property-categories.index'));
        $this->assertDatabaseMissing('property_categories', ['id' => $category->id]);
    }
}
