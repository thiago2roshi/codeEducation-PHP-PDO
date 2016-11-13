<?php
/**
* ValueObject da classe Client
*
* @example como seria usado a classe
* $sql = "SELECT * FROM usuarios";
*
* $query=$conexao->prepare($sql);
* $query->execute();
* $rs = $query->fetchAll(PDO::FETCH_CLASS,"usuariosVO") or die(print_r($query->errorInfo(), true));
*
* foreach ($rs as $key => $row){
*    //usando os métodos get da classe usuariosVO
*
*    echo $row->getId() . "<br>\n";
*    echo $row->getNome() . "<br>\n";
*    echo $row->getLogin() . "<br>\n";
*    echo $row->getSenha() . "<br><br>\n\n";
**/
namespace model;
class ClientesVO
{
    private $id    = 0;
    private $nome  = "";
    private $email = "";

# system
    public function __construct(){}
    private function __clone(){}
    public function __destruct()
    {
        foreach ($this as $key => $value) {
            unset($this->key);
        }
        foreach (array_keys(get_defined_vars()) as $var) {
            unset(${"$var"});
        }
        unset($var); // so para ter certeza
    }
    public function getID(){return $this->id;}
    public function setID($id)
    {
        $this->id = intval($id);
    }
    public function getNome(){return $this->nome;}
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail(){return $this->email;}
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
