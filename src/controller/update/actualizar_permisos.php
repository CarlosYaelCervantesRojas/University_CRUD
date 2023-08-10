<?php
    extract($_POST);
    $correo;
    $rol = intval($rol);
    $status = intval($status);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $actPermiso = "UPDATE usuarios_login SET rol = $rol, status = $status WHERE correo = '$correo';";
    
    try {
        $resultado = $mdb -> query($actPermiso);

        header("Location: ../../view/admin/permisos.php");

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>