<?php

require "../vendor/autoload.php";

use App\DAO\PessoaDAO;

$dao = new PessoaDAO();

$id = $_GET['id'] ?? null;

if ($id) {

    $dao->excluir((int) $id);
}

header("Location: pessoa-list.php");
exit;