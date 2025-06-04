<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cuenta;

class CuentaTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_cuenta_con_saldo_cero()
    {
        $cuenta = Cuenta::create(['saldo' => 0]);
        $this->assertEquals(0, $cuenta->saldo);
    }

    public function test_ingreso_valido_incrementa_saldo()
    {
        $cuenta = Cuenta::create(['saldo' => 0]);
        $cuenta->ingresar(100);
        $this->assertEquals(100, $cuenta->saldo);
    }

    public function test_ingreso_invalido_no_modifica_saldo()
    {
        $cuenta = Cuenta::create(['saldo' => 0]);
        $cuenta->ingresar(-100);
        $this->assertEquals(0, $cuenta->saldo);

        $cuenta->ingresar(6000.01);
        $this->assertEquals(0, $cuenta->saldo);

        $cuenta->ingresar(100.457);
        $this->assertEquals(0, $cuenta->saldo);
    }

    public function test_retirada_valida_disminuye_saldo()
    {
        $cuenta = Cuenta::create(['saldo' => 500]);
        $cuenta->retirar(100);
        $this->assertEquals(400, $cuenta->saldo);
    }

    public function test_retirada_invalida_no_modifica_saldo()
    {
        $cuenta = Cuenta::create(['saldo' => 200]);
        $cuenta->retirar(300);
        $this->assertEquals(200, $cuenta->saldo);

        $cuenta->retirar(-100);
        $this->assertEquals(200, $cuenta->saldo);

        $cuenta->retirar(6000.01);
        $this->assertEquals(200, $cuenta->saldo);
    }

    public function test_transferencia_valida_modifica_saldos()
    {
        $cuenta1 = Cuenta::create(['saldo' => 500]);
        $cuenta2 = Cuenta::create(['saldo' => 50]);

        $cuenta1->transferir($cuenta2, 100);

        $this->assertEquals(400, $cuenta1->saldo);
        $this->assertEquals(150, $cuenta2->saldo);
    }

    public function test_transferencia_invalida_no_modifica_saldos()
    {
        $cuenta1 = Cuenta::create(['saldo' => 200]);
        $cuenta2 = Cuenta::create(['saldo' => 50]);

        $cuenta1->transferir($cuenta2, 300);
        $this->assertEquals(200, $cuenta1->saldo);
        $this->assertEquals(50, $cuenta2->saldo);

        $cuenta1->transferir($cuenta2, -100);
        $this->assertEquals(200, $cuenta1->saldo);
        $this->assertEquals(50, $cuenta2->saldo);
    }
}
