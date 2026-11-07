<?php

namespace Database\Seeders;

use App\Models\Contacts;
use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contacts::updateOrCreate(
            ['email' => 'john.doe@example.com', 'subject' => 'Inquiry about apartment rental'],
            [
                'name' => 'John Doe',
                'phone' => '+254712345678',
                'message' => 'I am interested in renting a 2-bedroom apartment in Nairobi. Please contact me.',
            ]
        );

        Contacts::updateOrCreate(
            ['email' => 'jane.smith@example.com', 'subject' => 'Property viewing request'],
            [
                'name' => 'Jane Smith',
                'phone' => '+254723456789',
                'message' => 'I would like to schedule a viewing for the apartment on Kiambu Road.',
            ]
        );
    }
}
