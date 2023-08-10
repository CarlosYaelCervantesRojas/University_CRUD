<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

    $usuarios = "SELECT * FROM usuarios_login;";

    try {
        $resultado = $mdb -> query($usuarios);
        $info = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>