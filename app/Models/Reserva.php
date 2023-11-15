<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reserva extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'reservas';

    public function quarto(): BelongsTo
    {
        return $this->belongsTo(Quarto::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public static function reservasPorCliente(int $clienteId): HasMany
    {
        return static::where('cliente_id', $clienteId);
    }

    public static function quartosOcupadosEmData(string $data): HasMany
    {
        return static::where('data_checkin', '<=', $data)
            ->where('data_checkout', '>=', $data);
    }
}
