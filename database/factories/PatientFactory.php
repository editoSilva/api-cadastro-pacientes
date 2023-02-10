<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'name'          => $faker->name(),  
            'mother_name'   => $faker->name(),
            'birth_date'    => $faker->date('d-m-Y'),
            'cpf'           => $faker->cpf(),
            'cns'           => $faker->cpf()
        ];
    }
}