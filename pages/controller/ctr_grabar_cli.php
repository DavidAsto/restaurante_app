<?php
session_start();
include("../includes/cargar_clases.php");

$crudCliente = new CRUDCliente();

if (isset($_POST["btn_registrar_cli"])) {
    $cliente = new Cliente();

    // Utiliza los nombres de campo correctos
    $cliente->cliente_nombre = $_POST["txt_cli_nom"];
    $cliente->cliente_dni = $_POST["txt_cli_dni"];
    $cliente->cliente_celular = $_POST["txt_cli_cel"];
    $cliente->cliente_correo = $_POST["txt_cli_cor"];


    // Asigna el tipo de acción
    $tipo = $_POST["txt_tipo"] ?? "r"; // Por defecto, 'r' si no está definido

    if ($tipo == "r") {
        $_SESSION['mensaje'] = '¡Registro agregado!';
        $crudCliente->RegistrarCliente($cliente);
    } else if ($tipo == "e") {
        $_SESSION['mensaje'] = '¡Registro actualizado!';
        $cliente->cliente_id = $_POST["txt_cli_cod"];
        $crudCliente->EditarCliente($cliente);
    }

    header("Location: ../view/listar_cliente.php");
    exit(); // Asegúrate de detener la ejecución aquí
} else {
    echo "fail"; // Aquí se ejecuta si no se encuentra el botón
}
?>
