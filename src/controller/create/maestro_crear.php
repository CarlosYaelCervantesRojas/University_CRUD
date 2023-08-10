<?php
extract($_POST);

$correo = strtolower($correo);
$nombre;
$apellido;
$direccion;
$id_clase = intval($id_clase);

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

$crearLogin = "INSERT INTO usuarios_login (correo, contra, rol, status) VALUES ('$correo', 'maestro', 2, 1);";

try {
    
    $mdb -> query($crearLogin);

    $leerMaestro = $mdb -> query("SELECT * FROM usuarios_login WHERE correo = '$correo';");
    $nuevoMaestro = $leerMaestro -> fetch(PDO::FETCH_ASSOC);
    extract($nuevoMaestro);
    $id_user_login;

    $crearInfo = "INSERT INTO usuarios_info (id_usuario, nombre, apellido, direccion) VALUES ($id_user_login, '$nombre', '$apellido', '$direccion');";

    $mdb -> query($crearInfo);

    $asignarClase = "INSERT INTO maestros (id_maestro, clase_asignada) VALUES ($id_user_login, $id_clase);";

    $mdb -> query($asignarClase);

    header("Location: ../../view/admin/maestros.php");

} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
?>