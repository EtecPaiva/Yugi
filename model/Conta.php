<?php
class Conta {
    private $numero;
    private $tipoConta;
    private $saldo;
    private $cliente;

    public function __construct($numero, $tipoConta, $saldo, $cliente) {
        $this->numero = $numero;
        $this->tipoConta = $tipoConta;
        $this->saldo = $saldo;
        $this->cliente = $cliente;
    }

    // Getters
    public function getNumero() { return $this->numero; }
    public function getTipoConta() { return $this->tipoConta; }
    public function getSaldo() { return $this->saldo; }
    public function getCliente() { return $this->cliente; }

    // Setters
    public function setTipoConta($tipoConta) { $this->tipoConta = $tipoConta; }
    public function setSaldo($saldo) { $this->saldo = $saldo; }

    // Métodos
    public function depositar($valor) {
        $this->saldo += $valor;
    }

    public function sacar($valor) {
        if ($valor <= $this->saldo) {
            $this->saldo -= $valor;
        } else {
            throw new Exception("Saldo insuficiente!");
        }
    }
}
