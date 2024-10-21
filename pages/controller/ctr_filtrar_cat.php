<?php
include ("../includes/cargar_clases.php");

$crudCategoria = new CRUDCategoria();

// Manejo de filtrado de categorías
if (isset($_POST["valor"])) {
    $valor = $_POST["valor"];
    $crudCategoria->FiltrarCategoria($valor); // Cambiado a FiltrarCategoria
}
?>