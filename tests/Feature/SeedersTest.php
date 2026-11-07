<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Contacts;
use App\Models\Property;
use App\Models\PropertyImages;
use App\Models\VisitorData;
use Database\Seeders\BlogCategoriesSeeder;
use Database\Seeders\BlogImagesSeeder;
use Database\Seeders\BlogsSeeder;
use Database\Seeders\ContactsSeeder;
use Database\Seeders\PropertiesSeeder;
use Database\Seeders\PropertyCategoriesSeeder;
use Database\Seeders\PropertyImagesSeeder;
use Database\Seeders\PropertyTypesSeeder;
use Database\Seeders\VisitorDataSeeder;
use Database\Seeders\VisitorJourneySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeedersTest extends TestCase
{
    use RefreshDatabase;

    public function test_core_seeders_run()
    {
        $this->seed(PropertyCategoriesSeeder::class);
        $this->seed(PropertyTypesSeeder::class);
        $this->seed(PropertiesSeeder::class);
        $this->seed(PropertyImagesSeeder::class);
        $this->seed(BlogCategoriesSeeder::class);
        $this->seed(BlogsSeeder::class);
        $this->seed(BlogImagesSeeder::class);
        $this->seed(ContactsSeeder::class);
        $this->seed(VisitorDataSeeder::class);
        $this->seed(VisitorJourneySeeder::class);

        $this->assertTrue(Property::query()->exists());
        $this->assertTrue(PropertyImages::query()->exists());
        $this->assertTrue(Blog::query()->exists());
        $this->assertTrue(Contacts::query()->exists());
        $this->assertTrue(VisitorData::query()->exists());
    }
}
