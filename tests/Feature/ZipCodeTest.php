<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ZipCodeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_search_zip_code()
    {
        $response = $this->get('/api/v1/zip_cod_query/45065050');
    
        $response->assertStatus(201);
    
    }


}