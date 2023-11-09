<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_mesa',
        'estado',
    ];

    public function ordenes() {
        return $this->hasMany(Orden::class);
    }

    // Mesa.php

public function orden()
{
    return $this->hasOne(Orden::class, 'numero_mesa', 'numero_mesa');
}

}
