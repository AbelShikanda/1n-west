<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyIds = DB::table('properties')->pluck('id')->toArray();

        if (empty($propertyIds)) {
            return;
        }

        $images = [
            ['property_id' => $propertyIds[0], 'image_path' => 'property-1.jpg'],
            ['property_id' => $propertyIds[1] ?? $propertyIds[0], 'image_path' => 'property-2.jpg'],
        ];

        foreach ($images as $image) {
            DB::table('property_images')->updateOrInsert(
                [
                    'property_id' => $image['property_id'],
                    'image_path' => $image['image_path'],
                ],
                [
                    'is_primary' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
