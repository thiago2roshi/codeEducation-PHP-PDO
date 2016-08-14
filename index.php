<?php

require_once __DIR__ . '/lib/Cliente.class.php';
$cliente = new Cliente();

// $cliente->setId(65)
//         ->setNome('Gloria Henderson')
//         ->setEmail('pharetra@felis.edu')
// ;

$res = $cliente->listar(); # execute query

print
    '<table>'           .
        '<th><tr>'      .
        '<td>ID</td>'   .
        '<td>NOME</td>' .
        '<td>EMAIL</td>'.
        '</tr></th>'
;
    foreach($res as $line) {
        print '<tr>';
        foreach ($line as $value) {
            print '<td>'.$value.'</td>';
        }
        print '</tr>';
    }
print '</table>';
