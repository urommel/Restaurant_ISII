<?php

namespace App\Models;

use App\Models\Proveedor;
use App\Models\DetalleOrdenCompra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrdenCompra extends Model
{
    use HasFactory;

    protected $fillable = ['proveedores_id', 'estado'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function detallesOrdenCompra()
    {
        return $this->hasMany(DetalleOrdenCompra::class);
    }
}
