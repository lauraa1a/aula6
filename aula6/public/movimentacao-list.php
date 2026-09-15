<?php

require "../vendor/autoload.php";

use App\DAO\MovimentacaoDAO;

$dao = new MovimentacaoDAO();

$movimentacoes = $dao->listar();

$content = '

<div class="container py-4">

    <h2>Movimentações</h2>

    <a href="movimentacao-cadastrar.php"
       class="btn btn-primary mb-3">

        Nova Movimentação

    </a>

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

                <td>
                    ' . htmlspecialchars($movimentacao['id']) . '
                </td>

                <td>
                    ' . htmlspecialchars($movimentacao['pessoa']) . '
                </td>

                <td>
                    ' . htmlspecialchars($movimentacao['tipo']) . '
                </td>

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
                        $movimentacao['createdAt']
                    ) . '
                </td>

            </tr>
    ';
}

if (count($movimentacoes) == 0) {

    $content .= '
            <tr>

                <td colspan="6" class="text-center">

                    Nenhuma movimentação cadastrada.

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