<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Restaurante - Lista de Categorías";
        include("../includes/cabecera.php");
    ?>
</head>
<body>
    <?php
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        $crudCategoria = new CRUDCategoria(); // Asegúrate de que esta clase existe
        $rs_cat = $crudCategoria->ListarCategoria(); // Cambiar a la función que lista las categorías
    ?>
    <div class="container mt-3">
        <header>
            <h2>
                <i class="fas fa-list-alt"></i> Lista de Categorías
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
            <div class="reg_con_cat btn-group" role="group">
                <button class="btn_registrar_categoria btn btn-outline-dark">
                    <img class="logo" src="../../css/icons/add.svg"> Registrar
                </button>
                <button class="btn_consultar btn btn-outline-dark">
                    <img class="logo" src="../../css/icons/search.svg"> Consultar
                </button>
                <button class="btn_filtrar btn btn-outline-dark">
                    <img class="logo" src="../../css/icons/filter.svg"> Filtrar
                </button>
            </div>
        </nav>
        <section>
            <article class="table-responsive">
            <div class="row justify-content-center mt-3">
    <div class="col-12 col-md-8"> <!-- Cambiar tamaño de columna para centrado -->
        <div class="table-responsive"> <!-- Hacer tabla responsiva -->
            <table class="table table-hover text-center"> <!-- Centrando texto en la tabla -->
                <thead class="table-light">
                    <tr>
                        <th class="theader" scope="col">ID</th>
                        <th class="theader" scope="col">Nombre</th>
                        <th class="theader" scope="col" colspan="3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rs_cat as $cat) { ?>
                    <tr class="reg_categoria">
                        <th class="align-middle codcat" scope="row"><?=$cat->categoria_id?></th>
                        <td class="align-middle cat"><?=$cat->categoria_nombre?></td>
                        <td>
                            <button class="btn_mostrar_categoria btn btn-sm btn-success" title="Mostrar">
                                <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                            </button>
                            <button class="btn_editar_categoria btn btn-sm btn-warning" title="Editar">
                                <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                            </button>
                            <button class="btn_eliminar_categoria btn btn-sm btn-danger" title="Eliminar">
                                <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

            </article>
        </section>
    </div>
    <?php
        include("modal_categoria.php"); // Asegúrate de que este modal exista
        include("../includes/pie.php");
    ?>
</body>
</html>
