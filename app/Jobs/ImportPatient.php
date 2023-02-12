<?php

namespace App\Jobs;


use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Queue\SerializesModels;
use Laravel\Horizon\Contracts\Silenced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportPatient implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

   public $data;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        foreach($this->data as $data) {
            
            DB::beginTransaction();
            try {
                
                $patient = Patient::create([
                    'name'          => $data['name'],  
                    'mother_name'   => $data['name'],
                    'birth_date'    => $data['name'],
                    'cpf'           => $data['name'],
                    'cns'           => $data['name']
                ])->address()->create([
                    'cep'           => $data['cep'],
                    'street'        => $data['street'],
                    'number'        => $data['number'],
                    'neighborhood'  => $data['neighborhood'],
                    'city'          => $data['city'],
                    'state'         => $data['state'],
                    'complement'    => $data['complement']
                ]);

                DB::commit();
                
                if($patient) {
                    print "Paceiente ". $patient->name ."criado! ". PHP_EOL;
                }

            } catch (\Throwable $e) {
                
                Log::error($e->getMessage());
                DB::rollBack();
                
            }

            print "-------------------------------------------------". PHP_EOL;
            print "Deus seja louvado hoje e para sempre! "  .  PHP_EOL;
            print "-------------------------------------------------". PHP_EOL;
            
        

         }
      
    }
}