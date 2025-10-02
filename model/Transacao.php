<?php
class Transacao {
    private $id;
    private $tipo;
    private $valor;
    private $data;
    private $descricao;
    private $contaNum;

    public function __construct($id, $tipo, $valor, $data, $descricao, $contaNum) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->data = $data;
        $this->descricao = $descricao;
        $this->contaNum = $contaNum;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getTipo() { return $this->tipo; }
    public function getValor() { return $this->valor; }
    public function getData() { return $this->data; }
    public function getDescricao() { return $this->descricao; }
    public function getContaNum() { return $this->contaNum; }

    // Setters
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setValor($valor) { $this->valor = $valor; }
    public function setDescricao($descricao) { $this->descricao = $descricao; }
}
