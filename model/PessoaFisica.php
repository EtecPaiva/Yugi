<?php
require_once "Cliente.php";

class PessoaFisica extends Cliente {
    private $nome;
    private $cpf;
    private $dataNasc;
    private $sexo;

    public function __construct($id, $usuario, $senha, $telefone, $endereco, $nome, $cpf, $dataNasc, $sexo) {
        parent::__construct($id, $usuario, $senha, $telefone, $endereco);
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->dataNasc = $dataNasc;
        $this->sexo = $sexo;
    }

    // Getters
    public function getNome() { return $this->nome; }
    public function getCpf() { return $this->cpf; }
    public function getDataNasc() { return $this->dataNasc; }
    public function getSexo() { return $this->sexo; }

    // Setters
    public function setNome($nome) { $this->nome = $nome; }
    public function setCpf($cpf) { $this->cpf = $cpf; }
    public function setDataNasc($dataNasc) { $this->dataNasc = $dataNasc; }
    public function setSexo($sexo) { $this->sexo = $sexo; }
}
