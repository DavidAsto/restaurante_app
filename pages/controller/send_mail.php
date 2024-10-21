<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "bellezacallejosegabriel@gmail.com"; // Cambia esto por la dirección a la que deseas enviar el correo
    $subject = $_POST['asunto'];
    $message = "Nombre: " . $_POST['name'] . "\n" .
               "Correo: " . $_POST['email'] . "\n\n" .
               $_POST['msg'];
    $headers = 'From: ' . $_POST['email'] . "\r\n" .
               'Reply-To: ' . $_POST['email'];

    // Enviar el correo
    if (mail($to, $subject, $message, $headers)) {
        $resultado = "El correo enviado a $to fue exitoso.";
    } else {
        $resultado = "El correo no se pudo enviar.";
    }

    // Redirigir al formulario con el resultado
    header("Location: ../view/contacto.php?resultado=" . urlencode($resultado));
    exit;
}
?>
