<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Property;
use App\Models\PropertyImages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPropertyImagesTest extends TestCase
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

    public function test_property_images_index_requires_auth()
    {
        $response = $this->get('/admin/property-images');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_admin_can_view_property_images()
    {
        $admin = $this->admin();
        $property = Property::factory()->create();
        PropertyImages::factory()->create(['property_id' => $property->id]);

        $response = $this->actingAs($admin, 'admin')->get('/admin/property-images');

        $response->assertStatus(200);
        $response->assertViewIs('admin.property-images.index');
    }

    public function test_admin_can_create_property_image()
    {
        $admin = $this->admin();
        $property = Property::factory()->create();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-images', [
            'property_id' => $property->id,
            'image_path' => 'property-1.jpg',
            'is_primary' => true,
        ]);

        $response->assertRedirect(route('admin.property-images.index'));
        $this->assertDatabaseHas('property_images', ['image_path' => 'property-1.jpg']);
    }

    public function test_property_image_store_validation_requires_fields()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-images', []);

        $response->assertSessionHasErrors(['property_id', 'image_path']);
    }

    public function test_admin_can_delete_property_image()
    {
        $admin = $this->admin();
        $property = Property::factory()->create();
        $image = PropertyImages::factory()->create(['property_id' => $property->id]);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/property-images/' . $image->id);

        $response->assertRedirect(route('admin.property-images.index'));
        $this->assertDatabaseMissing('property_images', ['id' => $image->id]);
    }
}
