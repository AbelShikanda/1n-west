<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    use HasFactory;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contacts::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+254712345678',
            'subject' => 'Inquiry about apartment rental',
            'message' => 'I am interested in renting a 2-bedroom apartment in Nairobi. Please contact me.',
        ]);

        \App\Models\Contacts::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '+254723456789',
            'subject' => 'Property viewing request',
            'message' => 'I would like to schedule a viewing for the apartment on Kiambu Road.',
        ]);
    }
}