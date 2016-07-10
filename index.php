<?php

require_once __DIR__ . '/Cliente_class.php';

$cliente = new Cliente();

$cliente->setNome('Rogerio')
        ->setEmail('R.steve@srv.io')
;
$cliente->inserir();
