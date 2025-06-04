<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuenta extends Model
{
    use HasFactory;
    protected $fillable = ['saldo'];

    public function ingresar($cantidad)
    {
        if ($cantidad > 0 && $cantidad <= 6000 && round($cantidad, 2) == $cantidad) {
            $this->saldo += $cantidad;
            $this->save();
        }
    }

    public function retirar($cantidad)
    {
        if ($cantidad > 0 && $cantidad <= $this->saldo && $cantidad <= 6000 && round($cantidad, 2) == $cantidad) {
            $this->saldo -= $cantidad;
            $this->save();
        }
    }

    public function transferir(Cuenta $cuentaDestino, $cantidad)
    {
        if ($cantidad > 0 && $cantidad <= 3000 && $cantidad <= $this->saldo) {
            $this->retirar($cantidad);
            $cuentaDestino->ingresar($cantidad);
        }
    }
}
