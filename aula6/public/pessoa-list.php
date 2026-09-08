<?php

require "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

$pessoas = $dao->listar();

$content = '
<div class="container py-4">

    <h2>Pessoas cadastradas</h2>

    <a href="pessoa-create.php" class="btn btn-primary mb-3">
        Nova Pessoa
    </a>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Endereço</th>
            </tr>
        </thead>

        <tbody>
';

foreach ($pessoas as $pessoa) {

    $content .= '
            <tr>
                <td>' . htmlspecialchars($pessoa['id']) . '</td>
                <td>' . htmlspecialchars($pessoa['nome']) . '</td>
                <td>' . htmlspecialchars($pessoa['cpf']) . '</td>
                <td>' . htmlspecialchars($pessoa['telefone'] ?? '') . '</td>
                <td>' . htmlspecialchars($pessoa['endereco'] ?? '') . '</td>
            </tr>
    ';
}

if (count($pessoas) == 0) {

    $content .= '
            <tr>
                <td colspan="5" class="text-center">
                    Nenhuma pessoa cadastrada.
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