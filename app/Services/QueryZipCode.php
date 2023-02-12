<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class QueryZipCode {
    

        public function queryZipCode($zipCode) {

            $url = "https://viacep.com.br/ws/".$zipCode."/json";

            
            //Armazena a consulta para o futuro
            if(Cache::get($zipCode)) {

                return Cache::get($zipCode);
            }

            $response = Http::get($url);  

            if($response->successful()) {

            $objectAdress = [
                    'cep'           => $response->object()->cep,
                    'street'        => $response->object()->logradouro,
                    "complement"    => '',
                    'neighborhood'  => $response->object()->bairro,
                    'city'          => $response->object()->localidade,
                    'state'         => $response->object()->uf,
                    'city'          => $response->object()->localidade,
                ];

                Cache::put($zipCode, $objectAdress);
                

            return $objectAdress;
                
            }


            return [];

        }   
    
}