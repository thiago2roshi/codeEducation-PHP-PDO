<?php

// try/catch para tratativa de Exception na conexao com o banco
try {
    // nova conexao com db
	$conn = new \PDO('mysql:host=localhost;dbname=code_pdo','root', 'root');
    // query a ser executada
    $query = 'SELECT * FROM code_pdo.alunos';
    // executa a query e tras o resultado
    $stmt = $conn->query($query);
    // setando $res com uma array associativa e ordenada [0,1,2] do db
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC) // resultado com a array associativa
    #$res = $stmt->fetchAll() // captura todo o resultado
    // exibindo $res
    print_r($res);

    // com FETCH_CLASS ja fica legal
    $res = $stmt->fetchAll(PDO::FETCH_CLASS); // resultado como objetos de classe
    $res = $stmt->fetch(PDO::FETCH_CLASS); // tras apenas 1 resultado como objetos de classe
    #echo $res[0]->nome;
    foreach ($res as $key) {
        echo $key->nome . '</br>';
    }
}
catch (\PDOException $e) {
    echo "Conexao Com o DB impossivel" . $e->getCode() . ": " . $e->getMessage();
}
