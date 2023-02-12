<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\Patient;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_list_patients()
    {
        $response = $this->getJson('/api/v1/patients');

        $response->assertStatus(200);

    }

    public function test_show_unit_patients()
    {
        $response = $this->getJson('/api/v1/patients/10');
        
        $response->assertStatus(200);
    }

    public function test_create_patient()
    {
        $faker = \Faker\Factory::create('pt_BR');
        
        $data = [
            'image'         => $faker->image(null, 360, 360, 'animals', true, true, 'cats', true),
            'name'          => 'Édito Silva',
            'mother_name'   => 'Mãe aqui',
            'birth_date'    => '18/08/1988',
            'cpf'           => '03366272546',
            'cns'           => '898000085774482',
            'cep'           => '45065040',
            'street'        => "Rua Boa vontade",
            'number'        => 52,
            'neighborhood'  => "Patagônia",
            'city'          => 'Vitória da Conquista',
            'state'         => 'Bahia',
            'complement'    => 'casa 1'
            
        ];
        
        $response = $this->postJson('/api/v1/patients', $data);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Paciente cadastrado com sucesso!'
            ]);
    }

    public function test_csv_upload()
    {
            
        Storage::fake('csvfile');
        
        $file = UploadedFile::fake()->create('foo.csv');


        $response = $this->post('/api/v1/patients/import_list_patients', [
            'file' => $file,
        ]);


        $response->assertStatus(200)
        ->assertJson([
            'message' => 'Seu arquivo foi enviando!'
        ]);
            
    
    }

}