<?php
    session_start();
    extract($_POST);
    $email;
    $pass;

    if ($email === "" || $pass === "") {

        $_SESSION['campoVacio'] = true;

        header("Location: /src/index.php");
    } else {

    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

    $buscarUsuario = "SELECT * FROM usuarios_login WHERE correo = '$email' AND contra = '$pass'";

    try {
        $resultado = $mdb -> query($buscarUsuario);

        $user = $resultado->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $user['status'] === 1) {
            unset($_SESSION['campoVacio']);
            unset($_SESSION['incorrecto']);
            unset($_SESSION['status']);
            extract($user);

            $_SESSION['rol'] = $rol;

            header("Location: /src/view/dashboard.php");
            
        } elseif ($user && $user['status'] !== 1) {
            unset($_SESSION['campoVacio']);
            unset($_SESSION['incorrecto']);
            $_SESSION['status'] = true;

            header("Location: /src/index.php");
            
        } else {
            
            unset($_SESSION['campoVacio']);
            $_SESSION['incorrecto'] = true;

            header("Location: /src/index.php");
        }

    } catch (PDOException $e) {
        echo "Error: " . $e -> getMessage();
    }
}
?>