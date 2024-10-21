<?php
include ("../includes/cargar_clases.php");

$crudCategoria = new CRUDCategoria();

$categoria = null; // Inicializa la variable

// Manejo de consulta de categoría
if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
    $categoria = $crudCategoria->ConsultarCategoriaPorCodigo($cat_id); // Cambiado a ConsultarCategoriaPorCodigo
}
?>