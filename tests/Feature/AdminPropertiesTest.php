<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPropertiesTest extends TestCase
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

    public function test_properties_index_requires_auth()
    {
        $response = $this->get('/admin/properties');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_properties()
    {
        $admin = $this->admin();
        PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        Property::factory()->create([
            'categories_id' => PropertyCategories::first()->id,
            'types_id' => PropertyTypes::first()->id,
        ]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/properties');

        $response->assertStatus(200);
        $response->assertViewIs('admin.properties.index');
    }

    public function test_admin_can_create_property()
    {
        $admin = $this->admin();
        PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);

        $response = $this->actingAs($admin, 'admin')->post('/admin/properties', [
            'name' => 'Test Apartment',
            'slug' => 'test-apartment',
            'categories_id' => PropertyCategories::first()->id,
            'types_id' => PropertyTypes::first()->id,
            'price' => 50000,
            'country' => 'Kenya',
            'county' => 'Nairobi',
            'town' => 'Westlands',
        ]);

        $response->assertRedirect(route('admin.properties.index'));
        $this->assertDatabaseHas('properties', ['name' => 'Test Apartment']);
    }

    public function test_property_store_validation_requires_name()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/properties', []);

        $response->assertSessionHasErrors('name');
    }

    public function test_admin_can_delete_property()
    {
        $admin = $this->admin();
        PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        $property = Property::factory()->create([
            'categories_id' => PropertyCategories::first()->id,
            'types_id' => PropertyTypes::first()->id,
        ]);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/properties/' . $property->id);

        $response->assertRedirect(route('admin.properties.index'));
        $this->assertDatabaseMissing('properties', ['id' => $property->id]);
    }
}
