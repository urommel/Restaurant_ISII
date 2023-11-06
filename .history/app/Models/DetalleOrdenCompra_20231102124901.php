<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\OrdenCompra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetalleOrdenCompra extends Model
{
    use HasFactory;
    
    protected $fillable = ['ordenes_compra_id', 'producto_id', 'cantidad', 'precio_unitario'];

    public function ordenCompra()
    {
        return $this->belongsTo(OrdenCompra::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
