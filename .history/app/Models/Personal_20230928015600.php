<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;
    
    public function rules()
    {
        return [
            'role_id' => [
                'required',
                Rule::notIn([0]),
            ],
            'apellidos' => 'required|string|max:255',  
            'nombres' => 'required|string|max:255',
            'dni' => 'required|numeric|digits:8|unique:personals,dni',
            // 'fecha_nacimiento' => 'required|date',
            
            'phone' => 'required|numeric|digits:9',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Resto de las reglas de validación para los demás campos
        ];
    }
}
