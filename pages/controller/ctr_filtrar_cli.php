<?php
    include ("../includes/cargar_clases.php");

    $crudCliente = new CRUDCliente();

    if (isset($_POST["valor"])) {
        $valor = $_POST["valor"];

        $crudCliente->FiltrarCliente($valor);
    }
?>
