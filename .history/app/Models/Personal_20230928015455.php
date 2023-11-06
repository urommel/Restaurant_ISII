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
            'apellidos'
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Resto de las reglas de validación para los demás campos
        ];
    }
}
