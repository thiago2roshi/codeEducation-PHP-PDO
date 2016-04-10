<?php

require __DIR__ . '/lib/Conexao.class.php';

$conn = new Conexao();

function exibeAlunos($query)
{
    $query;
    try {
        $conn->connect();
        $res = $conn->selectDB($query);

    } catch (\PDOException $e) {
        echo "Ops, tivemos um problema com o banco de dados" .
              $e->getCode() . ': ' .
              $e->getMessage();
    }
    // printando table com os resultados da query
    echo "<table><th>"       .
             "<td>ID</td>"   .
             "<td>Nome</td>" .
             "<td>Nota</td>" .
         "</th>"
    foreach ($res as $key) {
        echo "<tr>" .
             "<td>" . $res['id']   . "</td>" .
             "<td>" . $res['nome'] . "</td>" .
             "<td>" . $res['nota'] . "</td>" .
             "</tr>"
    }
    echo "</table>"
}

// agora sim o codigo roda
echo "<h2>exibindo todos os alunos</h2>";
    exibeAlunos("SELECT * FROM `code_pdo`.`alunos`");
echo "<h2>exibindo as 3 maiores notas</h2>"
    exibeAlunos("SELECT * FROM `code_pdo`.`alunos` ORDER BY `nota` DESC LIMIT=3");
