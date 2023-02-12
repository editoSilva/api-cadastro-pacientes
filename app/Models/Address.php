<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected  $fillable = [
                            'patient_id',
                            'cep',
                            'street',
                            'number',
                            'neighborhood',
                            'city',
                            'state',
                            'complement'
                            ];


    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}