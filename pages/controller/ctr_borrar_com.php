<?php
    session_start();
    include ("../includes/cargar_clases.php");

    $crudcomida = new CRUDComida();

    if(isset($_GET["codcom"])){
        $codcom = $_GET["codcom"];
        $crudcomida->BorrarComida($codcom);
        $_SESSION['mensaje'] = '¡Registro eliminado!';
        header("location: ../view/listar_comida.php");
        exit();
    }