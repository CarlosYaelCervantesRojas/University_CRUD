<?php
    // solicitar maestros a DB para mostrar en vista
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $usuarios = "SELECT usuarios_login.id_user_login, usuarios_login.correo, usuarios_info.nombre, usuarios_info.apellido, usuarios_info.direccion, usuarios_info.nacimiento, clases.nombre_clase FROM usuarios_login INNER JOIN usuarios_info ON usuarios_login.id_user_login = usuarios_info.id_usuario INNER JOIN clases ON usuarios_login.id_user_login = clases.maestro WHERE usuarios_login.rol = 2;";
    

    try {
        $resultado = $mdb -> query($usuarios);
        $info = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>