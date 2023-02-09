<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected  $fillable = [
                            'patient_id',
                            'patients',
                            'cep',
                            'cep',
                            'street',
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