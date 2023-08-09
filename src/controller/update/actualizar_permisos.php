<?php
    // print_r($_POST);

    extract($_POST);
    $correo;
    $rol = intval($rol);
    $status = intval($status);

    // echo gettype($status);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $actPermiso = "UPDATE usuarios_login SET rol = $rol, status = $status WHERE correo = '$correo';";
    
    try {
        $resultado = $mdb -> query($actPermiso);
        // $info = $resultado -> fetchAll(PDO::FETCH_ASSOC);
        
        // session_start();
        // $_SESSION['usuarios'] = $info;

        // print_r($_SERVER);

        header("Location: ../../view/admin/permisos.php");

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>