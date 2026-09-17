<?php

require "../vendor/autoload.php";

use App\DAO\PessoaDAO;
use App\DAO\MovimentacaoDAO;

$pessoaDAO = new PessoaDAO();
$movimentacaoDAO = new MovimentacaoDAO();

$pessoas = $pessoaDAO->listar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pessoaId = (int) $_POST['pessoa_id'];
    $tipo = $_POST['tipo'];
    $valor = (float) $_POST['valor'];

    $pessoaDestinoId = !empty($_POST['pessoa_destino_id'])
        ? (int) $_POST['pessoa_destino_id']
        : null;

    $movimentacaoDAO->cadastrar(
        $pessoaId,
        $tipo,
        $valor,
        $pessoaDestinoId
    );

    header("Location: movimentacao-list.php");
    exit;
}

$content = '

<div class="container py-4">

    <h2>Cadastrar Movimentação</h2>

    <form method="POST">

        <div class="mb-3">

            <label class="form-label">
                Pessoa
            </label>

            <select name="pessoa_id" class="form-select" required>

                <option value="">
                    Selecione uma pessoa
                </option>
';

foreach ($pessoas as $pessoa) {

    $content .= '
                <option value="' . $pessoa['id'] . '">
                    ' . htmlspecialchars($pessoa['nome']) . '
                </option>
    ';
}

$content .= '

            </select>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Tipo de movimentação
            </label>

            <select name="tipo" class="form-select" required>

                <option value="">
                    Selecione
                </option>

                <option value="DEPÓSITO">
                    Depósito
                </option>

                <option value="SAQUE">
                    Saque
                </option>

                <option value="TRANSFERÊNCIA">
                    Transferência
                </option>

            </select>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Valor
            </label>

            <input
                type="number"
                name="valor"
                class="form-control"
                step="0.01"
                min="0.01"
                required
            >

        </div>


        <div class="mb-3">

            <label class="form-label">
                Pessoa destino
            </label>

            <select
                name="pessoa_destino_id"
                class="form-select"
            >

                <option value="">
                    Nenhuma
                </option>
';

foreach ($pessoas as $pessoa) {

    $content .= '
                <option value="' . $pessoa['id'] . '">
                    ' . htmlspecialchars($pessoa['nome']) . '
                </option>
    ';
}

$content .= '

            </select>

            <small class="text-muted">
                Preencha somente quando for uma transferência.
            </small>

        </div>


        <button type="submit" class="btn btn-success">
            Cadastrar
        </button>

        <a href="movimentacao-list.php" class="btn btn-secondary">
            Voltar
        </a>

    </form>

</div>

';

include "layout.php";