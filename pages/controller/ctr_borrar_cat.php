<?php
session_start();
include ("../includes/cargar_clases.php");

$crudCategoria = new CRUDCategoria(); // Cambiado a CRUDCategoria

// Manejo de eliminación de categoría
if (isset($_GET["codcat"])) {
    $codcategoria = $_GET["codcat"];
    $crudCategoria->BorrarCategoria($codcategoria); // Cambiado a BorrarCategoria
    $_SESSION['mensaje'] = '¡Registro eliminado!';
    header("location: ../view/listar_categoria.php"); // Cambia a la vista de listar categorías
    exit();
}
?>