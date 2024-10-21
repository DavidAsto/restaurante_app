<?php
    include ("../includes/cargar_clases.php");

    $crudcomida = new CRUDComida();

    if(isset($_POST['cod_com'])){
        $cod_com = $_POST['cod_com'];
        $crudcomida->ConsultarComidaPorCodigo($cod_com);
    }

?>