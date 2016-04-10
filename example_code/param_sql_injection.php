<?php

try {
	$conn = new \PDO('mysql:host=localhost;dbname=code_pdo','root', 'root');
	// onde :id vou passar depois
    $query = 'SELECT * FROM code_pdo.alunos WHERE id=:id';
	// preparando query para rodar
	$stmt = $conn->prepare($query);
	// setando valores :id
	$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
	// executando query
	$stmt->execute();
	// resumindo passos do statement e fetch
	// isso cria uma consulta com o retorno imediato
    print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
}
catch (\PDOException $e) {
    echo "Conexao Com o DB impossivel" . $e->getCode() . ": " . $e->getMessage();
}
