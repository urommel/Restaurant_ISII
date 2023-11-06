<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $fillable = ['proveedor_id', 'estado'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detallesOrdenCompra()
    {
        return $this->hasMany(DetalleOrdenCompra::class);
    }
}
