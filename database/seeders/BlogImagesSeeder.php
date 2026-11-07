<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogIds = DB::table('blogs')->pluck('id')->toArray();

        if (empty($blogIds)) {
            return;
        }

        foreach ($blogIds as $index => $blogId) {
            DB::table('blog_images')->insert([
                'blog_id' => $blogId,
                'image_path' => 'blog-image-' . ($index + 1) . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
