<?php

namespace App\Http\Requests;

use App\Rules\CpfValidations;
use Illuminate\Foundation\Http\FormRequest;
use LaravelLegends\PtBrValidator\Rules\Cns;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cpf' => ["required", "unique:patients,cpf", "digits:11","numeric", new CpfValidations],
            'cns' => ["required", new Cns]
        ];
    }


    public function message()
    {
        return [
    
        ];
    }


}