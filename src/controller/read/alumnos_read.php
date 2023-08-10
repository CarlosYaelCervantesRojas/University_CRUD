<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $usuarios ="SELECT usuarios_login.id_user_login, alumnos.dni, usuarios_info.nombre, usuarios_info.apellido, usuarios_login.correo, usuarios_info.direccion FROM usuarios_login INNER JOIN usuarios_info ON usuarios_login.id_user_login = usuarios_info.id_usuario INNER JOIN alumnos ON usuarios_info.id_usuario = alumnos.id_alumno WHERE usuarios_login.rol = 3;";

    try {
        $resultado = $mdb -> query($usuarios);
        $alumnos = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>