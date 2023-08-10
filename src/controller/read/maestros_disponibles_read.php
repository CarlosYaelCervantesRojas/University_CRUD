<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $usuarios ="SELECT maestros.id_maestro, usuarios_info.nombre, usuarios_info.apellido FROM usuarios_info INNER JOIN maestros ON maestros.id_maestro = usuarios_info.id_usuario WHERE maestros.clase_asignada = 1;";

    try {
        $resultado = $mdb -> query($usuarios);
        $disponibles = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>