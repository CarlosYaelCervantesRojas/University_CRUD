<?php
    // solicitar clases a DB para mostrar en vista
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");
    
    $clasesT = "SELECT * FROM clases;";
    

    try {
        $resultado = $mdb -> query($clasesT);
        $numClases = $resultado -> rowCount();
        $clases = $resultado -> fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
?>