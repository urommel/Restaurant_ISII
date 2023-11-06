<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';


    // protected $fillable = ['mesa', 'mesero', 'cliente', 'observaciones', 'total'];

    protected $fillable = [
        'mesa_id', 'cliente_id', 'estado',
    ];

    public function mesa() {
        return $this->belongsTo(Mesa::class);
    }
    
    public function bebidas() {
        return $this->belongsToMany(Bebida::class)->withPivot('cantidad', 'precio');
    }
    
    public function platos() {
        return $this->belongsToMany(Plato::class)->withPivot('cantidad', 'precio');
    }
}
