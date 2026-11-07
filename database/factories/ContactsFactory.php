<?php

namespace Database\Factories;

use App\Models\Contacts;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactsFactory extends Factory
{
    protected $model = Contacts::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'subject' => $this->faker->sentence(3),
            'message' => $this->faker->paragraph(),
        ];
    }
}
