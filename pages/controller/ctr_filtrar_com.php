<?php
    include ("../includes/cargar_clases.php");

    $crudcomida = new CRUDComida();

    if(isset($_POST["valor"])){
        $valor = $_POST["valor"];
        $crudcomida->FiltrarComida($valor);
    }