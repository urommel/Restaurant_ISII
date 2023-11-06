<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;


    // protected $fillable = ['mesa', 'mesero', 'cliente', 'observaciones', 'total'];

    protected $fillable = [
        'mesa_id', 'cliente_id', 'estado',
    ];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function detalles()
    {
        return $this->hasMany(DetallesOrden::class);
    }
}
