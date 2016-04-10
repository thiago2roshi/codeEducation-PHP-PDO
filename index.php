<?php

try {
    $conn = new \PDO('mysql:
                      host=localhost;
                      dbname=code_pdo',
                      'root', 'root'
                    );
    $query =
}
catch (\PDOException $e){
    echo "Ops, tivemos um problema com o banco de dados" .
          $e->getCode() . ': ' .
          $e->getMessage();
}
