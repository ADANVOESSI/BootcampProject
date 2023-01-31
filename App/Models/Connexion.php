<?php

namespace App\Models;

class Connexion
{
    public function connexion()

    {
        $DB_HOST = "localhost";

        $DB_NAME = "bd_project";

        $USERNAME = "root";

        $PASSWORD = "";

        $dsn = "mysql:host=$DB_HOST;dbname=$DB_NAME;";

        try {
            $conn = new \PDO($dsn, $USERNAME, $PASSWORD);

            return $conn;

        } catch (PDOException $e) {

            echo $e->getMessage();
            
        }
    }
}
