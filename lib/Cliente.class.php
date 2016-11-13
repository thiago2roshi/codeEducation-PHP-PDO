<?php
namespace lib;
use \lib\Conexao;
use \model\ClientesVO;

require_once __DIR__ . '/..'.'/vendor'.'/autoload.php';

class Clientes extends Conexao
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
# Methods
    public function listar()
    {
        $query  = 'SELECT * FROM `clientes` WHERE :condition';
        $params = isset($this->condition) ? array(':condition' => $this->condition) : null;
        $stmt   = $this->db->selectDB($query, $params, 'ClientesVO');

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
