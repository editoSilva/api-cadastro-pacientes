<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class QueryZipCode {
    

        public function queryZipCode($zipCode) {

            $url = "https://viacep.com.br/ws/".$zipCode."/json";

            $response = Http::get($url);  

            if($response->successful()) {

            $objectAdress = [
                    'cep'           => $response->object()->cep,
                    'street'        => $response->object()->logradouro,
                    "complement"    => $response->object()->logradouro,
                    'neighborhood'  => $response->object()->bairro,
                    'city'          => $response->object()->localidade,
                    'state'         => $response->object()->uf,
                    'city'          => $response->object()->localidade,
                ];
                

            return $objectAdress;
                
            }

           
            return [];
            
            
           
        }   
    
}