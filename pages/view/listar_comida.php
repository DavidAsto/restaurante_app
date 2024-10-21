<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicacion de Restaurante - Lista de comidas";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include("../includes/cargar_clases.php");

            $crudcomida = new CRUDComida();
            $rs_com = $crudcomida->ListarComida();
        ?>
        <div class="container mt-3">
            <header>
                <h2>
                    <i class="fas fa-list-alt"></i> Lista de comidas
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
                <div class="reg_con_fil btn-group" role="group">
                    <button class="btn_registrar btn btn-outline-dark">
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
                                        <th class="theader" scope="col">Disponible</th>
                                        <th class="theader" scope="col">Precio</th>
                                        <th class="theader" scope="col" colspan="3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 0;
                                        foreach ($rs_com as $com){
                                            $i++;
                                    ?>
                                    <tr class="reg_comida">
                                        <th class="align-middle codcom" scope="row"><?=$com->comida_id?></th>
                                        <td class="align-middle com"><?=$com->comida_nombre?></td>
                                        <td class="align-middle cd"><?=$com->comida_disponibilidad?></td>
                                        <td class="align-middle cp"><?=$com->comida_precio?></td>
                                        <td>
                                            <button class="btn_mostrar btn btn-small btn-success"><i class="fa-solid fa-circle-info" style="color: #ffffff;"></i></button>
                                            <button class="btn_editar btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                            <button class="btn_eliminar btn btn-small btn-danger"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
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
            </selection>
        </div>
        <?php
            include("modal_comida.php");
            include("../includes/pie.php");
        ?>
    </body>
</html>