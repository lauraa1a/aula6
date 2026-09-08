<?php

namespace App\DAO;

use App\Model\Pessoa;
use App\Config\Database;

use PDO;

class PessoaDAO
{

    private PDO $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // INSERT
    public function insert(Pessoa $pessoa): bool
    {
        $sql = "INSERT INTO pessoas (nome, telefone, cpf, endereco)
                VALUES (:nome, :telefone, :cpf, :endereco)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nome' => $pessoa->getNome(),
            ':telefone' => $pessoa->getTelefone(),
            ':cpf' => $pessoa->getCpf(),
            ':endereco' => $pessoa->getEndereco()
        ]);

    }}
