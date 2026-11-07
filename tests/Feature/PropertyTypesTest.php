<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\PropertyTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyTypesTest extends TestCase
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
        $response = $this->get('/admin/property-types');
        $response->assertRedirect(route('getLogin'));
    }

    public function test_index_loads_for_admin()
    {
        $admin = $this->admin();
        PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);

        $response = $this->actingAs($admin, 'admin')->get('/admin/property-types');

        $response->assertStatus(200);
        $response->assertViewIs('admin.property-types.index');
    }

    public function test_store_creates_type()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-types', [
            'name' => 'Villa',
        ]);

        $response->assertRedirect(route('property-types.index'));
        $this->assertDatabaseHas('property_types', ['name' => 'Villa']);
    }

    public function test_store_validation_requires_name()
    {
        $admin = $this->admin();

        $response = $this->actingAs($admin, 'admin')->post('/admin/property-types', []);

        $response->assertSessionHasErrors('name');
    }

    public function test_destroy_deletes_type()
    {
        $admin = $this->admin();
        $type = PropertyTypes::factory()->create(['name' => 'ToDelete', 'slug' => 'todelete']);

        $response = $this->actingAs($admin, 'admin')->delete('/admin/property-types/' . $type->id);

        $response->assertRedirect(route('property-types.index'));
        $this->assertDatabaseMissing('property_types', ['id' => $type->id]);
    }
}
