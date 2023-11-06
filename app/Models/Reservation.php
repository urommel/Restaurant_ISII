<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['mesa_id', 'client_id', 'reservation_datetime', 'duration_minutes', 'notes', 'status'];

    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'mesa_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
