<?php

namespace App\Models;

use App\Models\DetalleOrdenCompra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipo', 'precio', 'url', 'stock', 'disponible', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    
}
