<?php
    extract($_POST);
    $dni;
    $correo;
    $nombre;
    $apellido;
    $direccion;
    $id_user_login = intval($id_user_login);
    $borrar = intval($borrar);
    
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

    switch ($borrar) {
        case 0:

            $actInfo = "UPDATE usuarios_info SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion' WHERE id_usuario = $id_user_login;";
    
            try {
                $mdb -> query($actInfo);

                header("Location: ../../view/admin/alumnos.php");

            } catch (PDOException $e) {
                echo "Error: " . $e -> getMessage();
            }

            break;

        case 1:
            
            $borrarAlumno = "DELETE FROM usuarios_login WHERE id_user_login = $id_user_login AND correo = '$correo';";

            try {
                $mdb -> query($borrarAlumno);

                header("Location: ../../view/admin/alumnos.php");

            } catch (PDOException $e) {
                echo "ERROR:" . $e ->getMessage();
            }

            break;
    }
?>