<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
                            'name',  
                            'mother_name',
                            'birth_date',
                            'cpf',
                            'cns'
                            ];

    
    public function adress() {
        
        return $this->hasOne(Adress::class);
    }
}