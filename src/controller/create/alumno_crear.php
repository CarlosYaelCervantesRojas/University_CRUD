<?php
extract($_POST);

$dni = intval($dni);
$correo = strtolower($correo);
$nombre;
$apellido;
$direccion;

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

$crearLogin = "INSERT INTO usuarios_login (correo, contra, rol, status) VALUES ('$correo', 'alumno', 3, 1);";

try {
    
    $mdb -> query($crearLogin);

    $leerAlumno = $mdb -> query("SELECT * FROM usuarios_login WHERE correo = '$correo';");
    $nuevoAlumno = $leerAlumno -> fetch(PDO::FETCH_ASSOC);
    extract($nuevoAlumno);
    $id_user_login;

    $crearInfo = "INSERT INTO usuarios_info (id_usuario, nombre, apellido, direccion) VALUES ($id_user_login, '$nombre', '$apellido', '$direccion');";

    $mdb -> query($crearInfo);

    $crearAlumno = "INSERT INTO alumnos (id_alumno, dni) VALUES ($id_user_login, $dni);";

    $mdb -> query($crearAlumno);

    header("Location: ../../view/admin/alumnos.php");

} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
?>