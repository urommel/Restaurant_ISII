<?php

namespace App\Models;

use App\Models\Mesa;
use App\Models\Bebida;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';


    // protected $fillable = ['mesa', 'mesero', 'cliente', 'observaciones', 'total'];

    // protected $fillable = [
    //     'mesa_id', 'cliente_id', 'estado',
    // ];

    protected $fillable = ['mesero', 'numero_mesa', 'clients_id', 'observaciones'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class);
    }

    public function bebidas()
    {
        return $this->belongsToMany(Bebida::class)->withPivot('stock', 'precio');
    }

    public function platos()
    {
        return $this->belongsToMany(Plato::class)->withPivot('stock', 'precio');
    }


    public function detalles()
    {
        return $this->hasMany(DetalleOrden::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'clients_id');
    }
}
