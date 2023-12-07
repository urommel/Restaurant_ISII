<?php

namespace App\Models;

use App\Models\Orden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleOrden extends Model
{
    use HasFactory;

    protected $table = 'detalleordenes';

    protected $fillable = ['orden_id', 'producto_nombre', 'cantidad', 'precio_unitario', 'precio_total'];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
