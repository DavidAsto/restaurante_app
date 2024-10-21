<?php
if (isset($_POST['enviar'])) {
    echo "<p>Formulario enviado</p>"; // Para verificar si se llega aquí.
    if (!empty($_POST['name']) && !empty($_POST['asunto']) && !empty($_POST['msg']) && !empty($_POST['email'])) {
        $name = $_POST['name'];
        $asunto = $_POST['asunto'];
        $msg = $_POST['msg'];
        $email = $_POST['email'];

        $header = "From: aa@gmail.com" . "\r\n";
        $header .= "Reply-To: aa@gmail.com" . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();

        $mail = @mail($email, $asunto, $msg, $header);
        if ($mail) {
            echo "<h4>Mail enviado exitosamente!</h4>";
        } else {
            echo "<h4>Hubo un error al enviar el correo.</h4>";
        }
    } else {
        echo "<h4>Por favor, completa todos los campos.</h4>";
    }
}
?>
