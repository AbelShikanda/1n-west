<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = DB::table('property_categories')->value('id') ?? 1;
        $typeId = DB::table('property_types')->value('id') ?? 1;

        $properties = [
            [
                'categories_id' => $categoryId,
                'types_id' => $typeId,
                'price' => 12000000.00,
                'name' => 'Modern 2-Bedroom Apartment',
                'slug' => Str::slug('Modern 2-Bedroom Apartment'),
                'rooms' => 2,
                'baths' => 2,
                'living_rooms' => 1,
                'kitchens' => 1,
                'country' => 'Kenya',
                'county' => 'Nairobi',
                'town' => 'Westlands',
                'meta_description' => 'A modern 2-bedroom apartment in Westlands, Nairobi.',
                'meta_keywords' => 'apartment, nairobi, westlands, rental',
                'meta_image' => 'property-1.jpg',
                'parking' => 1,
                'whatsapp' => 1,
                'telegram' => 0,
                'website' => 1,
                'promotion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categories_id' => $categoryId,
                'types_id' => $typeId,
                'price' => 18000000.00,
                'name' => 'Luxury 3-Bedroom Apartment',
                'slug' => Str::slug('Luxury 3-Bedroom Apartment'),
                'rooms' => 3,
                'baths' => 3,
                'living_rooms' => 1,
                'kitchens' => 1,
                'country' => 'Kenya',
                'county' => 'Nairobi',
                'town' => 'Kilimani',
                'meta_description' => 'A luxury 3-bedroom apartment in Kilimani, Nairobi.',
                'meta_keywords' => 'luxury apartment, nairobi, kilimani, rental',
                'meta_image' => 'property-2.jpg',
                'parking' => 1,
                'whatsapp' => 1,
                'telegram' => 0,
                'website' => 1,
                'promotion' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categories_id' => $categoryId,
                'types_id' => $typeId,
                'price' => 45000000.00,
                'name' => 'Commercial Office Space',
                'slug' => Str::slug('Commercial Office Space'),
                'rooms' => 4,
                'baths' => 2,
                'living_rooms' => 1,
                'kitchens' => 1,
                'country' => 'Kenya',
                'county' => 'Nairobi',
                'town' => 'Upper Hill',
                'meta_description' => 'Commercial office space in Upper Hill, Nairobi.',
                'meta_keywords' => 'office space, nairobi, upper hill, commercial',
                'meta_image' => 'property-3.jpg',
                'parking' => 1,
                'whatsapp' => 0,
                'telegram' => 0,
                'website' => 1,
                'promotion' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($properties as $property) {
            DB::table('properties')->updateOrInsert(
                ['slug' => $property['slug']],
                $property
            );
        }
    }
}
