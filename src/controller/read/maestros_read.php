<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $usuarios ="SELECT usuarios_login.id_user_login, usuarios_login.correo, usuarios_info.nombre, usuarios_info.apellido, usuarios_info.direccion, usuarios_info.nacimiento, maestros.clase_asignada FROM usuarios_login INNER JOIN usuarios_info ON usuarios_login.id_user_login = usuarios_info.id_usuario INNER JOIN maestros ON usuarios_info.id_usuario = maestros.id_maestro WHERE usuarios_login.rol = 2;";

    try {
        $resultado = $mdb -> query($usuarios);
        $info = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>