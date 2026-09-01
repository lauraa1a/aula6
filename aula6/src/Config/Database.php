<?php

namespace App\Config;

use PDO;
use PDOException;

class Database
{
    public function conectar()
    {
        try {
            $pdo = new PDO(
                "mysql:host=localhost;dbname=aula6",
                "root",
                ""
            );

            return $pdo;

        } catch (PDOException $e) {
            return null;
        }
    }
}