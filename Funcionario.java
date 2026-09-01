<?php

class Funcionario
{
    public $nome;
    public $salario;
    public $previdencia;

    public function calcularDesconto()
    {
        $desconto = ($this->salario * 0.275) + $this->previdencia;

        return round($desconto, 2);
    }

    public function mostrarDados()
    {
        echo "Nome: " . $this->nome . "<br>";
        echo "Salário: R$ " . $this->salario . "<br>";
        echo "Previdência: R$ " . $this->previdencia . "<br>";
        echo "Desconto: R$ " . $this->calcularDesconto() . "<br><br>";
    }
}