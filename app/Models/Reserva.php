<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'reservas';

    public function reservasPorCliente($clienteId)
    {
        return $this->where('cliente_id', $clienteId)->get();
    }
}
