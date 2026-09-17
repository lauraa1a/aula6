<?php

require "../vendor/autoload.php";

use App\DAO\MovimentacaoDAO;

$dao = new MovimentacaoDAO();

$pesquisa = $_GET['pesquisa'] ?? '';

$movimentacoes = [];

if ($pesquisa != '') {
    $movimentacoes = $dao->pesquisar($pesquisa);
}

$content = '

<div class="container py-4">

    <h2>Pesquisar Movimentação</h2>

    <form method="GET">

        <div class="mb-3">

            <label class="form-label">
                Pesquisar
            </label>

            <input
                type="text"
                name="pesquisa"
                class="form-control"
                placeholder="Digite o nome da pessoa ou tipo..."
                value="' . htmlspecialchars($pesquisa) . '"
            >

        </div>

        <button type="submit" class="btn btn-primary">
            Pesquisar
        </button>

    </form>

    <br>

    <table class="table table-bordered">

        <thead>

            <tr>
                <th>ID</th>
                <th>Pessoa</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Destino</th>
                <th>Data</th>
            </tr>

        </thead>

        <tbody>
';

foreach ($movimentacoes as $movimentacao) {

    $content .= '

            <tr>

                <td>' . htmlspecialchars($movimentacao['id']) . '</td>

                <td>' . htmlspecialchars($movimentacao['pessoa']) . '</td>

                <td>' . htmlspecialchars($movimentacao['tipo']) . '</td>

                <td>
                    R$ ' . number_format(
                        $movimentacao['valor'],
                        2,
                        ',',
                        '.'
                    ) . '
                </td>

                <td>
                    ' . htmlspecialchars(
                        $movimentacao['pessoa_destino'] ?? '-'
                    ) . '
                </td>

                <td>
                    ' . htmlspecialchars(
                        $movimentacao['createdAt'] ?? '-'
                    ) . '
                </td>

            </tr>

    ';
}

if ($pesquisa != '' && count($movimentacoes) == 0) {

    $content .= '

        <tr>

            <td colspan="6" class="text-center">

                Nenhuma movimentação encontrada.

            </td>

        </tr>

    ';
}

$content .= '

        </tbody>

    </table>

</div>

';

include "layout.php";
?>