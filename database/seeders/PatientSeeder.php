<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory(300)->has(Address::factory())->create();
    }
}