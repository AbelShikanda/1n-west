<?php

namespace Tests\Feature;

use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    public function test_properties_listing_page_loads()
    {
        PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        Property::factory()->count(5)->create([
            'categories_id' => PropertyCategories::first()->id,
            'types_id' => PropertyTypes::first()->id,
        ]);

        $response = $this->get('/properties');

        $response->assertStatus(200);
        $response->assertViewIs('pages.properties');
    }

    public function test_property_detail_page_loads()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        $property = Property::factory()->create([
            'name' => 'Test Apartment',
            'slug' => 'test-apartment',
            'categories_id' => $category->id,
            'types_id' => $type->id,
            'price' => 50000,
            'meta_description' => 'A beautiful test apartment',
            'town' => 'Nairobi',
            'county' => 'Nairobi County',
            'country' => 'Kenya',
        ]);

        $response = $this->get('/properties/test-apartment');

        $response->assertStatus(200);
        $response->assertViewIs('pages.property-details');
        $response->assertViewHas('property', function ($p) use ($property) {
            return $p->id === $property->id;
        });
    }

    public function test_property_detail_404_for_nonexistent_slug()
    {
        $response = $this->get('/properties/nonexistent-slug');

        $response->assertStatus(404);
    }

    public function test_properties_filter_by_category()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        Property::factory()->count(3)->create([
            'categories_id' => $category->id,
            'types_id' => $type->id,
        ]);

        $response = $this->get('/properties?category=' . $category->id);

        $response->assertStatus(200);
    }

    public function test_properties_filter_by_type()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential', 'slug' => 'residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment', 'slug' => 'apartment']);
        Property::factory()->count(3)->create([
            'categories_id' => $category->id,
            'types_id' => $type->id,
        ]);

        $response = $this->get('/properties?type=' . $type->id);

        $response->assertStatus(200);
    }
}
