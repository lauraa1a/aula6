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
                <th>Ações</th>
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

                <td>
                    <a href="pessoa-editar.php?id=' . $pessoa['id'] . '"
                       class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <a href="pessoa-excluir.php?id=' . $pessoa['id'] . '"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm(\'Tem certeza que deseja excluir esta pessoa?\')">
                        Excluir
                    </a>
                </td>

            </tr>
    ';
}

if (count($pessoas) == 0) {

    $content .= '
            <tr>
                <td colspan="6" class="text-center">
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