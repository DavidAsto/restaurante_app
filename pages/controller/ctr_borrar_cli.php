
<?php
    session_start();
    include ("../includes/cargar_clases.php");

    $crudCliente = new CRUDCliente();

    if(isset($_GET["codcli"])){
        $codcli = $_GET["codcli"];
        $crudCliente->BorrarCliente($codcli);
        $_SESSION['mensaje'] = '¡Registro eliminado!';
        header("location: ../view/listar_cliente.php");
        exit();
    }
