<?php
require_once __DIR__ . '/lib/Conexao.class.php';

class Cliente
{
    private $db;
    private $nome;
    private $email;
    private $id;

    # System
#    private function __construct()
#    {
#	$this->db = $db;
#    }

    public function listar()
    {

    }

    public function inserir()
    {
        $query  = 'INSERT INTO clientes (nome, email) VALUES (:nome, :email)';
        $values = array(':nome'  => $this->getNome,
                        ':email' => $this->getEmail);
        $stmt   = Conexao::insertDB($query, $values);

        return $stmt;
    }

    public function alterar()
    {

    }

    public function deletar()
    {

    }

    # Getters And Setters
    public function getId(){return $this->id;}
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function getNome(){return $this->nome;}
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }
    public function getEmail(){return $this->email;}
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}
