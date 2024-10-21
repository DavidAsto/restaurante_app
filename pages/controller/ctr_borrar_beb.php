<?php
session_start();
include ("../includes/cargar_clases.php");

$crudBebida = new CRUDBebida();

if (isset($_GET["codbebida"])) {
    $codbebida = $_GET["codbebida"];
    $crudBebida->BorrarBebida($codbebida);
    $_SESSION['mensaje'] = '¡Registro eliminado!';
    header("location: ../view/listar_bebida.php");
    exit();
}
?>
