<?php
    extract($_POST);
    
    $correo;
    $nombre;
    $apellido;
    $direccion;
    $id_user_login = intval($id_user_login);
    $id_clase = intval($id_clase);
    $borrar = intval($borrar);
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

    switch ($borrar) {
        case 0:

            $actInfo = "UPDATE usuarios_info SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion' WHERE id_usuario = $id_user_login;";

            $actClase = "UPDATE maestros SET clase_asignada = $id_clase WHERE id_maestro = $id_user_login;";
    
            try {
                $resultado = $mdb -> query($actInfo);
                $resultadoClase = $mdb -> query($actClase);

                header("Location: ../../view/admin/maestros.php");

            } catch (PDOException $e) {
                echo "Error: " . $e -> getMessage();
            }

            break;

        case 1:
            
            $borrarMaestro = "DELETE FROM usuarios_login WHERE id_user_login = $id_user_login AND correo = '$correo';";

            try {
                $res = $mdb -> query($borrarMaestro);

                header("Location: ../../view/admin/maestros.php");

            } catch (PDOException $e) {
                echo "ERROR:" . $e ->getMessage();
            }

            break;
    }
?>