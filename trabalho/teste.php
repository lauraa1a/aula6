<?php

require_once "Funcionario.php";

$joao = new Funcionario("João Filho", 1000, 100);
$maria = new Funcionario("Maria Rute", 2000, 200);
$jose = new Funcionario("José Salgado", 3000, 400);

$joao->mostrarDesconto();
$maria->mostrarDesconto();
$jose->mostrarDesconto();