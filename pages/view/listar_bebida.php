<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Restaurante - Lista de Bebidas";
        include("../includes/cabecera.php");
    ?>
</head>

<body>
    <?php
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        // Conectar a la base de datos
        $conn = new mysqli("serverg5-db.mysql.database.azure.com", "dasto", "Chaufa123", "tfinal");
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Recuperar las bebidas junto con el nombre de la categoría
        $sql = "SELECT b.bebida_id, b.bebida_desc, b.bebida_stock, b.bebida_precio, c.categoria_nombre 
                FROM bebida b 
                INNER JOIN categoria c ON b.bebida_categoria_id = c.categoria_id";

        $result = $conn->query($sql);
        $rs_bebida = []; // Inicializar el array para almacenar las bebidas

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rs_bebida[] = (object) [
                    'bebida_id' => $row['bebida_id'],
                    'bebida_desc' => $row['bebida_desc'],
                    'bebida_stock' => $row['bebida_stock'],
                    'bebida_precio' => $row['bebida_precio'],
                    'categoria_nombre' => $row['categoria_nombre'] // Aquí se agrega el nombre de la categoría
                ];
            }
        }

        // Cerrar la conexión a la base de datos
        $conn->close();
    ?>
    <div class="container mt-3">
        <header>
            <h2>
                <i class="fas fa-list-alt"></i> Lista de Bebidas
            </h2>
            <hr/>
        </header>
        <?php
                    if (isset($_SESSION['mensaje'])) {
                        echo '<div class="toast1 bg-success d-flex align-items-center ps-4 auto-close"><i class="fa-solid fa-check t-text" style="color: #ffffff;"></i>' . $_SESSION['mensaje'] . '</div>';
                        unset($_SESSION['mensaje']); // Limpia el mensaje después de mostrarlo
                    }
                ?>
        <nav>
            <div class="reg_con_bebida btn-group" role="group">
                <button class="btn_registrar_bebida btn btn-outline-dark">
                    <img class="logo" src="../../css/icons/add.svg"> Registrar
                </button>
                <button class="btn_consultar_bebida btn btn-outline-dark">
                    <img class="logo" src="../../css/icons/search.svg"> Consultar
                </button>
                <button class="btn_filtrar_bebida btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#modalFiltrarBebida">
                    <img class="logo" src="../../css/icons/filter.svg"> Filtrar
                </button>
            </div>
        </nav>
        <section>
            <article class="table-responsive">
                <div class="row justify-content-center mt-3">
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="theader" scope="col">ID</th>
                                    <th class="theader" scope="col">Descripción</th>
                                    <th class="theader" scope="col">Stock</th>
                                    <th class="theader" scope="col">Precio</th>
                                    <th class="theader" scope="col">Categoría</th> <!-- Nueva columna para Categoría -->
                                    <th class="theader" scope="col" colspan="3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($rs_bebida as $bebida) {
                                ?>
                                <tr class="reg_bebida">
                                    <th class="align-middle codbebida" scope="row"><?=$bebida->bebida_id?></th>
                                    <td class="align-middle desc"><?=$bebida->bebida_desc?></td>
                                    <td class="align-middle stock"><?=$bebida->bebida_stock?></td>
                                    <td class="align-middle precio"><?=$bebida->bebida_precio?></td>
                                    <td class="align-middle categoria"><?=$bebida->categoria_nombre?></td> <!-- Mostrar nombre de la categoría -->

                                    <td>
                                        <button class="btn_mostrar_bebida btn btn-small btn-success">
                                            <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                                        </button>
                                        <button class="btn_editar_bebida btn btn-small btn-warning">
                                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                        </button>
                                        <button class="btn_eliminar_bebida btn btn-small btn-danger">
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </article>
        </section>
    </div>
    <?php
        include("modal_bebida.php");
        include("../includes/pie.php");
    ?>
</body>
</html>
