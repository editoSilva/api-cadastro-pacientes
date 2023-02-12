<?php

namespace App\Services;

use App\Jobs\ImportPatient;
use Illuminate\Support\Facades\Http;

class ImportCsv {

        public function import($csv) 
        {
            $handle = fopen($csv, "r");
            $row = 0;
            while ($line = fgetcsv($handle, 1000, ",")) {
                if ($row++ == 0) {
                    continue;
                }
                
                $patients[] = [
                    //Patient
                    'name' => $line[0],
                    'mother_name' => $line[1],
                    'birth_date' => $line[2],
                    'cpf' => $line[3],
                    'cns' => $line[4],

                    //Adress
                    'cep' => $line[5],
                    'street' => $line[6],
                    'complement' => $line[7],
                    'number' => $line[8],
                    'neighborhood' => $line[9],
                    'city' => $line[10],
                    'state' => $line[11],
                ];

            }

            if(isset($patients)) 

            ImportPatient::dispatch($patients);

    }
}