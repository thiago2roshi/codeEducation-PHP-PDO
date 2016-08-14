<?php
require_once __DIR__ . '/Conexao.class.php';

class Cliente
{
    private $db;
    private $nome;
    private $email;
    private $id;
# System
    public function __construct()
    {
        $this->db = new Conexao;
    }

    public function __destruct()
    {
        foreach ($this as $key => $value) {
            unset($this->key);
        }
    }
# Getters And Setters
    public function setId($id){
        $this->id = intval($id);
        return $this;
    }
    public function setNome($nome){
        $this->nome = $nome;
        return $this;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
    public function getId()   {return $this->id;}
    public function getNome() {return $this->nome;}
    public function getEmail(){return $this->email;}

# Methods
    public function listar()
    {
        $query  = 'SELECT * FROM `clientes`';
        $stmt   = $this->db->selectDB($query);
        // $params = array(
        //     ':search' => $this,
        // );
        // $stmt   = $this->db->selectDB($query, $params, $class=null) or die(print_r($stmt->errorInfo(), true));
        self::__destruct();
        return $stmt;
    }

    public function inserir()
    {
        $query  = 'INSERT INTO `clientes` (`nome`,`email`) VALUES (:nome,:email)';
        $params = array(
                ':nome'  => $this->getNome(),
                ':email' => $this->getEmail()
        );
        $stmt   = $this->db->insertDB($query, $params) or die(print_r($stmt->errorInfo(), true));
        self::__destruct();
        return $stmt;
    }

    public function alterar()
    {
        $query  = 'UPDATE `clientes` SET `nome`=:nome, `email`=:email WHERE `id`=:id';
        $params = array(
                ':id'    => $this->getId(),
                ':nome'  => $this->getNome(),
                ':email' => $this->getEmail()
        );
        $stmt   = $this->db->updateDB($query, $params) or die(print_r($stmt->errorInfo(), true));
        self::__destruct();
        return $stmt;
    }

    public function deletar($id)
    {
        $query  = 'DELETE FROM `clientes` WHERE `id`=:id';
        $params = array(':id' => $id);
        $stmt   = $this->db->deleteDB($query, $params);
        self::__destruct();
        return $stmt;
    }
}
