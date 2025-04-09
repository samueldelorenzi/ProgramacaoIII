<?php

namespace exerc2;

class ContaBancaria
{
    public string $titular;
    private float $saldo;
    public int $numeroDaConta;
    private static int $numeroDeContas = 1;

    public function __construct($titular, $saldoInicial)
    {
        $this->titular = $titular;
        $this->saldoInicial($saldoInicial);
        $this->setNumeroConta();
    }
    public function saldoInicial(float $saldo): void
    {
        $this->saldo = $saldo;
    }
    public function depositar(float $valor): void
    {
        $this->saldo += $valor;
    }
    public function sacar(float $valor): void
    {
        $this->saldo -= $valor;
    }
    public function exibirSaldo(): string
    {
        return "Saldo: R$$this->saldo";
    }
    public function setNumeroConta(): void
    {
        $this->numeroDaConta = self::$numeroDeContas++;
    }
}

$conta1 = new ContaBancaria("Samuel", 1200.50);
echo "Titular: $conta1->titular <br>";
echo "Núm: $conta1->numeroDaConta <br>";
echo $conta1->exibirSaldo() . "<br>";

$conta2 = new ContaBancaria("Teste", 150.30);
echo "Titular: $conta2->titular <br>";
echo "Núm: $conta2->numeroDaConta <br>";
echo $conta2->exibirSaldo();

