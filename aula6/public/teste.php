<?php 

require_once "../vendor/autoload.php"; 

use App\Config\Database; 

$pdo = null; 

$database = new Database(); 

$pdo = $database->conectar(); 

if ($pdo != null) { 
    echo "Conexão realizada com sucesso!"; 
} else { 
    echo "Erro ao conectar com o banco de dados."; 
}