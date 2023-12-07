<?php

namespace App\Models;

use App\Models\Mesa;
use App\Models\Plato;
use App\Models\Bebida;
use App\Models\Client;
use App\Models\DetalleOrden;
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

    protected $fillable = ['mesero', 'mesas_id', 'clients_id', 'observaciones', 'monto_total', 'estado_venta'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'mesas_id');
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
        return $this->belongsTo(Client::class, 'clients_id');
    }
}
