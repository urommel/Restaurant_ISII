<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mesa',
        'estado',
        '_token', // Agrega '_token' a la lista de campos fillable
    ];
}
