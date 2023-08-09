<?php
    // solicitar permisos a DB para mostrar en vista
    // print_r($_SESSION);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    // $usuarios = "SELECT usuarios_login.id_user_login, usuarios_login.correo, usuarios_login.rol, usuarios_login.status, usuarios_info.nombre, usuarios_info.apellido FROM usuarios_login INNER JOIN usuarios_info ON usuarios_login.id_user_login = usuarios_info.id_usuario;";
    $usuarios = "SELECT * FROM usuarios_login;";

    try {
        $resultado = $mdb -> query($usuarios);
        $info = $resultado -> fetchAll(PDO::FETCH_ASSOC);
        
        // session_start();
        // $_SESSION['usuarios'] = $info;

        // print_r($_SERVER);

        // header("Location: ../../view/admin/permisos.php");

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>