<?php

// try/catch para tratativa de Exception na conexao com o banco
try {
    // nova conexao com db
	$conn = new \PDO('mysql:
        			  host=localhost;
        			  dbname=code_pdo',
        			  'root', 'root'
        			);
    // query a ser executada
    $query = 'SELECT * FROM code_pdo.alunos'; // return 0
//  $query = 'INSERT INTO code_pdo.alunos (nome, nota) VALUES ('Ricardo', 3);' // return 1
    // jogando em $res retornando pela query executada {0 = inalterado | 1 = modificado_db}
    $res = $conn->exec($query);
    // exibindo output
    print_r($res);
}
catch (\PDOException $e) {
    echo "Conexao Com o DB impossivel" . $e->getCode() . ": " . $e->getMessage();
}
