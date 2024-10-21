<?php
session_start();

include("../includes/cargar_clases.php");

$crudBebida = new CRUDBebida();

if (isset($_POST["btn_registrar_beb"])) {
    $bebida = new Bebida();

    // Utiliza los nombres de campo correctos
    $bebida->bebida_desc = $_POST["txt_beb_nom"];
    $bebida->bebida_stock = $_POST["txt_beb_stock"]; // Asegúrate de que este campo existe en el formulario
    $bebida->bebida_precio = $_POST["txt_beb_pre"];
    
    // Asigna el ID de categoría que viene del formulario
    $bebida->bebida_categoria_id = $_POST["txt_beb_cat"]; // Asegúrate de que este campo exista en el formulario

    // Asigna el tipo de acción
    $tipo = $_POST["txt_tipo"] ?? "r"; // Por defecto, 'r' si no está definido

    if ($tipo == "r") {
        $_SESSION['mensaje'] = '¡Registro agregado!';
        $crudBebida->RegistrarBebida($bebida);
    } else if ($tipo == "e") {
        $_SESSION['mensaje'] = '¡Registro actualizado!';
        $bebida->bebida_id = $_POST["txt_beb_cod"];
        $crudBebida->EditarBebida($bebida);
    }

    header("Location: ../view/listar_bebida.php");
    exit(); // Asegúrate de detener la ejecución aquí
} else {
    echo "fail"; // Aquí se ejecuta si no se encuentra el botón
}
?>
