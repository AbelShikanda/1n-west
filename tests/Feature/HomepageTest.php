<?php

namespace Tests\Feature;

use App\Models\Contacts;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_redirects_root_to_home()
    {
        $response = $this->get('/');
        $response->assertRedirect('/home');
    }

    public function test_homepage_loads_with_dynamic_properties()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        $property = Property::factory()->create([
            'name' => 'Skyline Home',
            'slug' => 'skyline-home',
            'categories_id' => $category->id,
            'types_id' => $type->id,
            'meta_image' => 'property-1.jpg',
            'price' => 99000,
        ]);

        $response = $this->get('/home');

        $response->assertStatus(200);
        $response->assertViewIs('home');
        $response->assertSee('Skyline Home');
        $response->assertSee(route('properties.show', $property->slug), false);
        $response->assertSee(route('contact.store'), false);
    }

    public function test_homepage_contact_form_submits()
    {
        $response = $this->post('/contact', [
            'name' => 'Home User',
            'email' => 'home@example.com',
            'subject' => 'Homepage inquiry',
            'message' => 'Testing homepage contact form.',
        ]);

        $response->assertRedirect(route('contact'));
        $this->assertDatabaseHas('contacts', [
            'email' => 'home@example.com',
            'subject' => 'Homepage inquiry',
        ]);
    }
}
