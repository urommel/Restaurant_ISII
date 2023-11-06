<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'apellidos',
        'nombres',
        'dni',
        'fecha_nacimiento',
        'phone',
        'fecha_inicio',
        'salario',
        'profile_photo',
        'user_id',
    ];
    
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
            'fecha_inicio' => 'required|date',
            'salario' => 'required|numeric',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            // Resto de las reglas de validación para los demás campos
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
