<?php
    print_r($_POST);

    extract($_POST);
    $correo;
    $nombre;
    $apellido;
    $direccion;
    $id_user_login = intval($id_user_login);
    // echo gettype($id_user_login);
    $nombre_clase = intval($nombre_clase);

    // echo gettype($nombre_clase);

    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $actInfo = "UPDATE usuarios_info SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion' WHERE id_usuario = $id_user_login;";

    // $actClase = "UPDATE clases SET maestro = $id_user_login WHERE id_clase = $nombre_clase;";
    
    try {
        $resultado = $mdb -> query($actInfo);
        // $resultadoClase = $mdb -> query($actClase);

        header("Location: ../../view/admin/maestros.php");

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>