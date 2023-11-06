<?php

namespace App\Models;

use App\Models\DetalleOrdenCompra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'stock'];

    public function detallesOrdenCompra()
    {
        return $this->hasMany(DetalleOrdenCompra::class);
    }
}
