<?php

    $dbname = "universidad";
    $userDB = "root";
    $passDB = "";

    try {
        $mdb = new PDO("mysql:host=localhost;dbname=$dbname", $userDB, $passDB);

        // echo "Conectado a Base de Datos";

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
        die();
    }
?>