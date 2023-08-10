<?php
extract($_POST);

$nombre_clase;
$id_maestro = intval($id_maestro);

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

$crearClase = "INSERT INTO clases (nombre_clase) VALUES ('$nombre_clase');";

try {
    
    $mdb -> query($crearClase);

    $leerIDNuevaClase = $mdb -> query("SELECT clases.id_clase FROM clases WHERE nombre_clase = '$nombre_clase';");
    $nuevoIDClase = $leerIDNuevaClase -> fetch(PDO::FETCH_ASSOC);
    extract($nuevoIDClase);
    $id_clase;

    $asignarClase = "UPDATE maestros SET clase_asignada = $id_clase WHERE id_maestro = $id_maestro;";

    $mdb -> query($asignarClase);

    header("Location: ../../view/admin/clases.php");

} catch (PDOException $e) {
    echo "Error: " . $e -> getMessage();
}
?>