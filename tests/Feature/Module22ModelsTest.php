<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategories;
use App\Models\BlogImages;
use App\Models\Contacts;
use App\Models\Property;
use App\Models\PropertyCategories;
use App\Models\PropertyImages;
use App\Models\PropertyTypes;
use App\Models\VisitorData;
use App\Models\VisitorJourney;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class Module22ModelsTest extends TestCase
{
    use RefreshDatabase;

    public function test_property_has_many_images_and_primary_image()
    {
        $property = Property::factory()->create();
        PropertyImages::factory()->create(['property_id' => $property->id, 'is_primary' => false]);
        $primary = PropertyImages::factory()->create(['property_id' => $property->id, 'is_primary' => true]);

        $property->load('images', 'primaryImage');

        $this->assertCount(2, $property->images);
        $this->assertNotNull($property->primaryImage);
        $this->assertEquals($primary->id, $property->primaryImage->id);
    }

    public function test_blog_category_blog_and_images_relationships()
    {
        $category = BlogCategories::factory()->create(['name' => 'News']);
        $blog = Blog::factory()->create(['category_id' => $category->id, 'title' => 'Hello World']);
        $image = BlogImages::factory()->create(['blog_id' => $blog->id]);

        $this->assertEquals($category->id, $blog->category->id);
        $this->assertTrue($category->blogs->contains($blog));
        $this->assertTrue($blog->images->contains($image));
        $this->assertNotEmpty($blog->slug);
        $this->assertNotEmpty($category->slug);
    }

    public function test_contacts_can_be_created_via_factory()
    {
        $contact = Contacts::factory()->create(['subject' => 'Inquiry']);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id, 'subject' => 'Inquiry']);
    }

    public function test_visitor_data_and_journeys_relationships()
    {
        $visitor = VisitorData::factory()->create(['country' => 'Kenya']);
        $journey = VisitorJourney::factory()->create([
            'visitor_data_id' => $visitor->id,
            'page_url' => '/home',
            'event_type' => 'page_view',
        ]);

        $this->assertTrue($visitor->journeys->contains($journey));
        $this->assertEquals($visitor->id, $journey->visitorData->id);
    }

    public function test_property_pivot_tables_store_links()
    {
        $property = Property::factory()->create();
        $type = PropertyTypes::factory()->create(['name' => 'Apartment']);
        $category = PropertyCategories::factory()->create(['name' => 'Residential']);

        $property->category();
        $this->assertDatabaseHas('properties', ['id' => $property->id]);

        \DB::table('property_property_types')->insert([
            'property_id' => $property->id,
            'property_type_id' => $type->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \DB::table('property_property_categories')->insert([
            'property_id' => $property->id,
            'property_category_id' => $category->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->assertDatabaseHas('property_property_types', [
            'property_id' => $property->id,
            'property_type_id' => $type->id,
        ]);
        $this->assertDatabaseHas('property_property_categories', [
            'property_id' => $property->id,
            'property_category_id' => $category->id,
        ]);
    }
}
