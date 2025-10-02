<?php
class Cliente {
    private $id;
    private $usuario;
    private $senha;
    private $telefone;
    private $endereco;

    public function __construct($id, $usuario, $senha, $telefone, $endereco) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getUsuario() { return $this->usuario; }
    public function getSenha() { return $this->senha; }
    public function getTelefone() { return $this->telefone; }
    public function getEndereco() { return $this->endereco; }

    // Setters
    public function setUsuario($usuario) { $this->usuario = $usuario; }
    public function setSenha($senha) { $this->senha = $senha; }
    public function setTelefone($telefone) { $this->telefone = $telefone; }
    public function setEndereco($endereco) { $this->endereco = $endereco; }
}
