<?php
    include ("../includes/cargar_clases.php");

    $crudCliente = new CRUDCliente();

    if(isset($_POST['cod_cli'])){
        $cod_cli = $_POST['cod_cli'];
        $crudCliente->MostrarClientePorCodigo($cod_cli);
    }

?>