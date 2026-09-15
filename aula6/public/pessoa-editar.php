<?php

require "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: pessoa-list.php");
    exit;
}

$pessoas = $dao->listar();

$pessoaEncontrada = null;

foreach ($pessoas as $pessoa) {

    if ($pessoa['id'] == $id) {
        $pessoaEncontrada = $pessoa;
        break;
    }
}

if (!$pessoaEncontrada) {
    header("Location: pessoa-list.php");
    exit;
}


// ALTERAR
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];

    $dao->alterar(
        $id,
        $nome,
        $telefone,
        $cpf,
        $endereco
    );

    header("Location: pessoa-list.php");
    exit;
}


$content = '

<div class="container py-4">

    <h2>Editar Pessoa</h2>

    <form method="POST">

        <div class="mb-3">
            <label class="form-label">Nome</label>

            <input
                type="text"
                name="nome"
                class="form-control"
                value="' . htmlspecialchars($pessoaEncontrada['nome']) . '"
                required
            >
        </div>


        <div class="mb-3">
            <label class="form-label">Telefone</label>

            <input
                type="text"
                name="telefone"
                class="form-control"
                value="' . htmlspecialchars($pessoaEncontrada['telefone'] ?? '') . '"
            >
        </div>


        <div class="mb-3">
            <label class="form-label">CPF</label>

            <input
                type="text"
                name="cpf"
                class="form-control"
                value="' . htmlspecialchars($pessoaEncontrada['cpf']) . '"
                required
            >
        </div>


        <div class="mb-3">
            <label class="form-label">Endereço</label>

            <input
                type="text"
                name="endereco"
                class="form-control"
                value="' . htmlspecialchars($pessoaEncontrada['endereco'] ?? '') . '"
            >
        </div>


        <button type="submit" class="btn btn-success">
            Salvar Alterações
        </button>

        <a href="pessoa-list.php" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</div>

';

include "layout.php";