<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Restaurante - Lista de Clientes";
        include("../includes/cabecera.php");
    ?>
</head>
<body>
    <?php
        include("../includes/menu.php");
        include("../includes/cargar_clases.php");

        $crudCliente = new CRUDCliente();
        $rs_cli = $crudCliente->ListarCliente();
    ?>
    <div class="container mt-3">
        <header>
            <h2>
                <i class="fas fa-list-alt"></i> Lista de Clientes
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
            <div class="reg_con_cl btn-group" role="group">
                <button class="btn_registrar_cliente btn btn-outline-dark">
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
                    <div class="col-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="theader" scope="col">ID</th>
                                    <th class="theader" scope="col">Nombre</th>
                                    <th class="theader" scope="col">Correo</th>
                                    <th class="theader" scope="col">Teléfono</th>
                                    <th class="theader" scope="col">Dni</th>
                                    <th class="theader" scope="col" colspan="3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($rs_cli as $cli) {
                                ?>
                                <tr class="reg_cliente">
                                    <th class="align-middle codcli" scope="row"><?=$cli->cliente_id?></th>
                                    <td class="align-middle cli"><?=$cli->cliente_nombre?></td>
                                    <td class="align-middle cor"><?=$cli->cliente_correo?></td>
                                    <td class="align-middle tel"><?=$cli->cliente_celular?></td>
                                    <td class="align-middle dni"><?=$cli->cliente_dni?></td>

                                    <td>
                                        <button class="btn_mostrar_cliente btn btn-small btn-success">
                                            <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                                        </button>
                                        <button class="btn_editar btn btn-small btn-warning">
                                            <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                        </button>
                                        <button class="btn_eliminar btn btn-small btn-danger">
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
        include("modal_cliente.php");
        include("../includes/pie.php");
    ?>
</body>
</html>
