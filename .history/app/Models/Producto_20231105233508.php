<?php

namespace App\Models;

use App\Models\Tipo;
use App\Models\Categoria;
use App\Models\DetalleOrdenCompra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'tipos_id', 'precio', 'url', 'stock', 'disponible', 'categorias_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
