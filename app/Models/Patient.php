<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
                            'image',
                            'name',  
                            'mother_name',
                            'birth_date',
                            'cpf',
                            'cns'
                            ];

    
    public function scopeSearch($query, $request) 
    {
        
        $terms = $request->only('name', 'mother_name', 'birth_date', 'cpf', 'cns');


        foreach ($terms as $name => $value) {
            if ($value) { 
                $query->where($name, 'LIKE', '%' . $value . '%');
            }
        }
    
        return $query;

    }


    public function address() {
        
        return $this->hasOne(Address::class);
    }
}