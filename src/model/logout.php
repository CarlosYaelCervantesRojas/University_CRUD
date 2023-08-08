<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/model/connection_DB.php");

    $mdb = null;
    session_start();
    session_destroy();
    header('Location: /src/view/login.php');
?>