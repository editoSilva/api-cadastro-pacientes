<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Patient;

use App\Services\ImportCsv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatient;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePatientRequest;


class PatientController extends Controller
{
    private $patients;
    private $importCsv;

    public function __construct()
    {
        $this->patients = app()->make(Patient::class);
        $this->importCsv = app()->make(ImportCsv::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $patients = $this->patients->search($request)->with('address')->paginate(20);

        if(count($patients) > 0) {
            return response()->json($patients);
        }

            return response()->json($patients);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatientRequest $request)
    {            
        
        $data = $request->all();
        
        DB::beginTransaction();
        try {

            $nameFile = null;
    
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
    
                $name = uniqid(date('HisYmd'));
        
                $extension = $request->image->extension();
                    
                $nameFile = "{$name}.{$extension}";

                $data['image'] = $nameFile;
    
                $upload = $request->image->storeAs('image', $nameFile);
            }

            $adress =   [
                'cep'           => $request->cep,
                'street'        => $request->street,
                'complement'    => $request->complement,
                'neighborhood'  => $request->neighborhood,
                'city'          => $request->city,
                'number'        => $request->number,
                'state'         => $request->state
            ];

            $patient = $this->patients
                            ->create($data)
                            ->address()
                            ->create($adress);

            DB::commit();

            return response()->json(['message' => 'Paciente cadastrado com sucesso!']);       
        

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            DB::rollBack();

            return response()->json(['message' => 'Não foi possível cadastrar o paciente!'], 404);
                        
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = $this->patients->with('address')->find($id);

        if($patient) {
            
            return response()->json($patient);

        }else{

            return response()->json(['message' => 'Paciente não encontrado!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $patient = $this->patients->find($id);
            
            
            $data = $request->only( 
                    'cep',
                    'street',
                    'number',
                    'neighborhood',
                    'city',
                    'state',
                    'complement'
            );

            if($patient) {

                $patient->update($request->all());

                $patient->address()
                        ->update($data);

                DB::commit();

                return response()->json(['message' => 'Paciente atualizado com sucesso!']);
                                    

            }else{

                return response()->json(['message' => 'Paciente não encontrado!']);
            }

        } catch (\Throwable $e) {
            
            Log::error($e->getMessage());

            DB::rollBack();
            
            return response()->json(['error' => 'Erro ao atualizar paciente!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = $this->patients->with('address')->find($id);

        if($patient) {
            
            $patient->delete();
            
            return response()->json(['message' => 'Paciente excluído com sucesso!']);

        }else{

            return response()->json(['message' => 'Paciente não encontrado!']);
        }
    }


    public function upload(Request $request)
    {
        $this->importCsv->import($request->file);

        return response()->json(['message' => 'Seu arquivo foi enviando!']);
    }
}