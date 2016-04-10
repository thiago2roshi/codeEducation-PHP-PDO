<?php

try {
	$conn = new \PDO('mysql:host=localhost;dbname=code_pdo','root', 'root');

    $query = 'SELECT * FROM code_pdo.alunos';
	// resumindo passos do statement e fetch
	// isso cria uma consulta com o retorno imediato
    foreach ($conn->query($query) as $key) {
    	echo $key['nome'] . '<br>';
    }
}
catch (\PDOException $e) {
    echo "Conexao Com o DB impossivel" . $e->getCode() . ": " . $e->getMessage();
}
