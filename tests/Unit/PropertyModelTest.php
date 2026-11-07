<?php

namespace Tests\Unit;

use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyTypes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_property_factory_creates_valid_record()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment']);

        $property = Property::factory()->create([
            'categories_id' => $category->id,
            'types_id' => $type->id,
            'name' => 'Test Apartment',
            'slug' => 'test-apartment',
            'price' => 50000,
        ]);

        $this->assertDatabaseHas('properties', [
            'id' => $property->id,
            'name' => 'Test Apartment',
            'slug' => 'test-apartment',
            'price' => 50000,
        ]);
    }

    public function test_promoted_property_is_featured()
    {
        $property = Property::factory()->create([
            'name' => 'Featured Apartment',
            'slug' => 'featured-apartment',
            'price' => 100000,
            'promotion' => true,
        ]);

        $this->assertTrue($property->promotion);
    }

    public function test_property_has_category_and_type_relationships()
    {
        $category = PropertyCategories::factory()->create(['name' => 'Residential']);
        $type = PropertyTypes::factory()->create(['name' => 'Apartment']);
        $property = Property::factory()->create([
            'categories_id' => $category->id,
            'types_id' => $type->id,
        ]);

        $this->assertEquals($category->id, $property->category->id);
        $this->assertEquals($type->id, $property->type->id);
    }
}
