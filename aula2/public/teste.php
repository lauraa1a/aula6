<?php

require_once "Funcionario.php";

$joao = new Funcionario();

$joao->nome = "João Filho";
$joao->salario = 1000;
$joao->previdencia = 100;

$maria = new Funcionario();

$maria->nome = "Maria Rute";
$maria->salario = 2000;
$maria->previdencia = 200;

$jose = new Funcionario();

$jose->nome = "José Salgado";
$jose->salario = 3000;
$jose->previdencia = 400;

$joao->mostrarDados();

$maria->mostrarDados();

$jose->mostrarDados();