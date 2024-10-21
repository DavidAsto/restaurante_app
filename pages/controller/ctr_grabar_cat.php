<?php
session_start();

include("../includes/cargar_clases.php");

$crudCategoria = new CRUDCategoria();

// Manejo de registro y edición de categorías
if (isset($_POST["btn_registrar_cat"])) {
    $categoria = new Categoria(); // Cambiado a Categoria

    // Utiliza los nombres de campo correctos
    $categoria->categoria_nombre = $_POST["txt_cat_nom"]; // Asegúrate de que este campo existe en el formulario

    // Asigna el tipo de acción
    $tipo = $_POST["txt_tipo"] ?? "r"; // Por defecto, 'r' si no está definido

    if ($tipo == "r") {
        $_SESSION['mensaje'] = '¡Registro agregado!';
        $crudCategoria->RegistrarCategoria($categoria); // Cambiado a RegistrarCategoria
    } else if ($tipo == "e") {
        $_SESSION['mensaje'] = '¡Registro actualizado!';
        $categoria->categoria_id = $_POST["txt_cat_cod"]; // Cambiado a categoria_id
        $crudCategoria->EditarCategoria($categoria); // Cambiado a EditarCategoria
    }

    header("Location: ../view/listar_categoria.php"); // Cambia a la vista de listar categorías
    exit(); // Asegúrate de detener la ejecución aquí
} else {
    echo "fail"; // Aquí se ejecuta si no se encuentra el botón
}
?>