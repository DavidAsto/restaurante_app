<?php
include ("../includes/cargar_clases.php");

$crudBebida = new CRUDBebida();

if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];
    $crudBebida->FiltrarBebida($valor);
}
?>
