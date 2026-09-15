<?php

require_once "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

$pesquisa = $_GET['pesquisa'] ?? '';

$pessoas = [];

if (!empty($pesquisa)) {
    $pessoas = $dao->pesquisar($pesquisa);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Pessoas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Pesquisar Pessoas</h2>

    <!-- CAMPO DE PESQUISA -->
    <form method="GET" action="pessoa-pesquisar.php">

        <div class="input-group mb-4">

            <input 
                type="text"
                name="pesquisa"
                class="form-control"
                placeholder="Digite o nome ou CPF"
                value="<?= htmlspecialchars($pesquisa) ?>"
            >

            <button type="submit" class="btn btn-primary">
                Pesquisar
            </button>

        </div>

    </form>


    <!-- RESULTADOS -->
    <?php if (!empty($pesquisa)): ?>

        <?php if (count($pessoas) > 0): ?>

            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Endereço</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($pessoas as $pessoa): ?>

                        <tr>
                            <td><?= $pessoa['id'] ?></td>
                            <td><?= htmlspecialchars($pessoa['nome']) ?></td>
                            <td><?= htmlspecialchars($pessoa['telefone']) ?></td>
                            <td><?= htmlspecialchars($pessoa['cpf']) ?></td>
                            <td><?= htmlspecialchars($pessoa['endereco']) ?></td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        <?php else: ?>

            <div class="alert alert-warning">
                Nenhuma pessoa encontrada.
            </div>

        <?php endif; ?>

    <?php endif; ?>

</div>

</body>
</html>