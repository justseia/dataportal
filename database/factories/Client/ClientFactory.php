<?php

namespace Database\Factories\Client;

use App\Models\Client\ClientType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone_number' => '7705' . fake()->numberBetween(100, 999) . fake()->numberBetween(10, 99) . fake()->numberBetween(10, 99),
            'organization' => fake()->word(),
            'email' => fake()->safeEmail(),
            'password' => 'asdasdasd',
            'access_paid_content' => fake()->boolean(),
            'close_all_content' => fake()->boolean(),
            'client_type_id' => ClientType::inRandomOrder()->first()->id,
        ];
    }
}
