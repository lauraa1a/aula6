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
    }

    // LISTAR
    public function listar(): array
    {
        $sql = "SELECT * FROM pessoas";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // PESQUISAR
    public function pesquisar(string $pesquisa): array
    {
        $sql = "SELECT * FROM pessoas
                WHERE nome LIKE :pesquisa
                OR cpf LIKE :pesquisa";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':pesquisa' => '%' . $pesquisa . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ALTERAR
    public function alterar(
        int $id,
        string $nome,
        string $telefone,
        string $cpf,
        string $endereco
    ): bool {

        $sql = "UPDATE pessoas
                SET nome = :nome,
                    telefone = :telefone,
                    cpf = :cpf,
                    endereco = :endereco
                WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':telefone' => $telefone,
            ':cpf' => $cpf,
            ':endereco' => $endereco
        ]);
    }

    // EXCLUIR
    public function excluir(int $id): bool
    {
        $sql = "DELETE FROM pessoas WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}