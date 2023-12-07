<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'client_type', 'identifier'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Escucha el evento "saving" y convierte el tipo de cliente a mayúsculas antes de guardar en la base de datos
    //     static::saving(function ($client) {
    //         $client->client_type = strtoupper($client->client_type);
    //     });
    // }
}
