<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $previdencia;

    public function __construct($nome, $salario, $previdencia)
    {
        $this->nome = $nome;
        $this->salario = $salario;
        $this->previdencia = $previdencia;
    }

    public function calcularDesconto()
    {
        return round($this->salario * 0.275 + $this->previdencia, 2);
    }

    public function mostrarDesconto()
    {
        echo "O valor do desconto de " . $this->nome . " é " . $this->calcularDesconto() . ".<br>";
    }
}