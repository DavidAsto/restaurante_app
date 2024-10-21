<?php
include ("../includes/cargar_clases.php");

$crudBebida = new CRUDBebida();

if (isset($_POST['beb_id'])) {
    $beb_id = $_POST['beb_id'];
    $bebida = $crudBebida->ConsultarBebidaPorCodigo($beb_id);
}
?>
