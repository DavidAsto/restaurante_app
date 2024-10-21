<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Restaurante - Lista de Bebidas";
        include("../includes/cabecera.php");
    ?>
    <style>
        .form-group {
            margin-bottom: 1em;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5em;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");
    ?>
    <div class="container mt-3">
        <header>
            <h2>
                <i class="fas fa-mobile-alt"></i> Contacto
            </h2>
            <hr/>
        </header>

        <!-- Mostrar el resultado del envío del correo -->
        <?php
        if (isset($_GET['resultado'])) {
            echo "<p>{$_GET['resultado']}</p>";
        }
        ?>

        <!-- Formulario de contacto -->
        <form method="post" action="../controller/send_mail.php">
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Ingresa tu nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
            </div>
            <div class="form-group">
                <label for="asunto">Asunto:</label>
                <input type="text" id="asunto" name="asunto" placeholder="Ingresa el asunto del mensaje" required>
            </div>
            <div class="form-group">
                <label for="msg">Mensaje:</label>
                <textarea id="msg" name="msg" placeholder="Escribe tu mensaje aquí" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="enviar" class="btn-submit">Enviar</button>
            </div>
        </form>

        <section>
            <article class="table-responsive">
                <!-- Contenido adicional aquí -->
            </article>
        </section>
    </div>
    <?php
        include("../includes/pie.php");
    ?>
</body>
</html>
