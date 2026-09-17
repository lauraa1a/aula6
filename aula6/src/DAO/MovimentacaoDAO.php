<?php

namespace App\DAO;

use App\Config\Database;
use PDO;

class MovimentacaoDAO
{
    private PDO $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // CADASTRAR
    public function cadastrar(
        int $pessoaId,
        string $tipo,
        float $valor,
        ?int $pessoaDestinoId = null
    ): bool {

        $sql = "INSERT INTO movimentacoes
                (pessoa_id, tipo, valor, pessoa_destino_id)
                VALUES
                (:pessoa_id, :tipo, :valor, :pessoa_destino_id)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':pessoa_id' => $pessoaId,
            ':tipo' => $tipo,
            ':valor' => $valor,
            ':pessoa_destino_id' => $pessoaDestinoId
        ]);
    }

    // LISTAR
    public function listar(): array
    {
        $sql = "SELECT
                    m.id,
                    m.tipo,
                    m.valor,
                    m.createdAt,
                    p.nome AS pessoa,
                    pd.nome AS pessoa_destino
                FROM movimentacoes m
                INNER JOIN pessoas p
                    ON p.id = m.pessoa_id
                LEFT JOIN pessoas pd
                    ON pd.id = m.pessoa_destino_id
                ORDER BY m.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // PESQUISAR
    public function pesquisar(string $pesquisa): array
    {
        $sql = "SELECT
                    m.id,
                    m.tipo,
                    m.valor,
                    m.createdAt,
                    p.nome AS pessoa,
                    pd.nome AS pessoa_destino
                FROM movimentacoes m
                INNER JOIN pessoas p
                    ON p.id = m.pessoa_id
                LEFT JOIN pessoas pd
                    ON pd.id = m.pessoa_destino_id
                WHERE p.nome LIKE :pesquisa
                   OR m.tipo LIKE :pesquisa
                ORDER BY m.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':pesquisa' => '%' . $pesquisa . '%'
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}