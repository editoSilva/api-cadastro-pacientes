<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        
        return [
            'cep'       => $faker->postcode(),
            'street'    => $faker->name(),
            'neighborhood' => $faker->name(),
            'number' => $faker->randomNumber(),
            'city' => $faker->name(),
            'state' =>  $faker->name(),
            'complement' => $faker->name(),
            ];
    }
}