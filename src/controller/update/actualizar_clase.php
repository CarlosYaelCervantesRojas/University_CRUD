<?php
extract($_POST);
$nombre_clase;
$id_maestro = intval($id_maestro);
$id_clase = intval($id_clase);
$borrar = intval($borrar);

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

switch ($borrar) {
    case 0:
    
        $updateClase = "UPDATE maestros SET clase_asignada = $id_clase WHERE id_maestro = $id_maestro;";

        try {
    
            $mdb -> query($updateClase);

            header("Location: ../../view/admin/clases.php");

        } catch (PDOException $e) {
            echo "Error: " . $e -> getMessage();
        }

        break;
    
    case 1:

        $deleteClase = "DELETE FROM clases WHERE id_clase = $id_clase;";
        $liberarMaestro = "UPDATE maestros SET clase_asignada = 1 WHERE clase_asignada = $id_clase;";

        try {
    
            $mdb -> query($liberarMaestro);
            $mdb -> query($deleteClase);
        
            header("Location: ../../view/admin/clases.php");
        
        } catch (PDOException $e) {
            echo "Error: " . $e -> getMessage();
        }

        break;
}

?>