<?php
require_once "Cliente.php";

class PessoaJuridica extends Cliente {
    private $razaoSocial;
    private $nomeFantasia;
    private $fundacao;
    private $cnpj;

    public function __construct($id, $usuario, $senha, $telefone, $endereco, $razaoSocial, $nomeFantasia, $fundacao, $cnpj) {
        parent::__construct($id, $usuario, $senha, $telefone, $endereco);
        $this->razaoSocial = $razaoSocial;
        $this->nomeFantasia = $nomeFantasia;
        $this->fundacao = $fundacao;
        $this->cnpj = $cnpj;
    }

    // Getters
    public function getRazaoSocial() { return $this->razaoSocial; }
    public function getNomeFantasia() { return $this->nomeFantasia; }
    public function getFundacao() { return $this->fundacao; }
    public function getCnpj() { return $this->cnpj; }

    // Setters
    public function setRazaoSocial($razaoSocial) { $this->razaoSocial = $razaoSocial; }
    public function setNomeFantasia($nomeFantasia) { $this->nomeFantasia = $nomeFantasia; }
    public function setFundacao($fundacao) { $this->fundacao = $fundacao; }
    public function setCnpj($cnpj) { $this->cnpj = $cnpj; }
}
