<div class="modal fade" id="md_borrar_bebida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="borrarBebidaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="staticBackdropLabelBebida">Borrar Bebida</h4>
                <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x" style="color: #000000;"></i></button>
            </div>
            <div class="modal-body mborrar">
                <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                <p class="card-text">
                    <span class="lbl_bebida"></span> (<span class="lbl_codbebida"></span>)
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                <a href="#" class="btn_borrar_bebida btn btn-danger">Borrar</a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="md_editar_bebida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarBebidaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_editar_bebida" name="frm_editar_bebida" method="post" action="../controller/ctr_grabar_beb.php" autocomplete="off">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="e"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="editarBebidaLabel">Editar Bebida</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="txt_beb_cod" class="form-label">Código</label>
                                <input type="text" class="form-control" id="txt_beb_cod" name="txt_beb_cod" placeholder="Código" maxlength="5" readonly value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_beb_nom" class="form-label">Descripción</label>
                                <input type="text" class="form-control" id="txt_beb_nom" name="txt_beb_nom" placeholder="Nombre" maxlength="50" value=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_beb_stock" class="form-label mt-2">Stock</label>
                                <input type="text" class="form-control" id="txt_beb_stock" name="txt_beb_stock" placeholder="Descripción" maxlength="100" value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_beb_pre" class="form-label mt-2">Precio</label>
                                <input type="number" class="form-control" step="0.1"id="txt_beb_pre" name="txt_beb_pre" placeholder="Precio" maxlength="10" value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_beb_cat" class="form-label mt-2">Categoría</label>
                                <select class="form-control" id="txt_beb_cat" name="txt_beb_cat" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php
                                    // Conexión a la base de datos y consulta
                                    $conn = new mysqli("localhost", "root", "", "tfinal");

                                    // Verificar conexión
                                    if ($conn->connect_error) {
                                        die("Conexión fallida: " . $conn->connect_error);
                                    }

                                    // Consulta para obtener categorías
                                    $sql = "SELECT categoria_id, categoria_nombre FROM categoria";
                                    $result = $conn->query($sql);

                                    // Verificar si hay resultados
                                    if ($result->num_rows > 0) {
                                        // Llenar las opciones del select
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['categoria_id'] . "'>" . $row['categoria_nombre'] . "</option>";
                                        }
                                    } else {
                                        // Si no hay categorías, puedes mostrar un mensaje o dejar vacío
                                        echo "<option value=''>No hay categorías disponibles</option>";
                                    }

                                    // Cerrar la conexión
                                    $conn->close();
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_beb" name="btn_registrar_beb">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="md_mostrar_bebida" tabindex="-1" aria-labelledby="mostrarBebidaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffb347;">
                <h4 class="modal-title" id="mostrarBebidaLabel">Información de la Bebida</h4>
            </div>
            <div class="modal-body justify-content-center">
                <div class="row border border-1 rounded px-3 py-4 my-1 mx-1">
                    <div class="col-6">
                        <h5 class="card-title">Código</h5>
                        <p class="card-text"><span class="lbl_codbebida"></span></p>
                        <h5 class="card-title">Stock</h5>
                        <p class="card-text"><span class="lbl_stock"></span></p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Descripción</h5>
                        <p class="card-text"><span class="lbl_bebida"></span></p>
                        <h5 class="card-title">Precio</h5>
                        <p class="card-text"><span class="lbl_precio"></span></p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Categoria</h5>
                        <p class="card-text"><span class="lbl_categoria"></span></p>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="md_registrar_bebida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabelBebida" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_registrar_bebida" name="frm_registrar_bebida" method="post" action="../controller/ctr_grabar_beb.php" autocomplete="off">
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabelBebida">Registrar Bebida</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="txt_beb_nom" class="form-label">Nombre de la Bebida</label>
                                <input type="text" class="form-control" id="txt_beb_nom" name="txt_beb_nom" placeholder="Nombre de la Bebida" maxlength="50" required />
                            </div>
                            <div class="col-md-12">
                                <label for="txt_beb_stock" class="form-label mt-2">Stock</label>
                                <input type="number" class="form-control" id="txt_beb_stock" name="txt_beb_stock" placeholder="Cantidad Disponible" required />
                            </div>
                            <div class="col-md-12">
                                <label for="txt_beb_pre" class="form-label mt-2">Precio</label>
                                <input type="text" class="form-control" id="txt_beb_pre" name="txt_beb_pre" placeholder="Precio" required />
                            </div>
                            <div class="col-md-12">
    <label for="txt_beb_cat" class="form-label mt-2">Categoría</label>
    <select class="form-control" id="txt_beb_cat" name="txt_beb_cat" required>
        <option value="">Seleccione una categoría</option>
        <!-- Aquí se llenarán las categorías desde PHP -->
        <?php
        // Conexión a la base de datos y consulta
        $conn = new mysqli("localhost", "root", "", "tfinal");
        
        // Verificar conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta para obtener categorías
        $sql = "SELECT categoria_id, categoria_nombre FROM categoria";
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Llenar las opciones del select
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['categoria_id'] . "'>" . $row['categoria_nombre'] . "</option>";
            }
        } else {
            // Si no hay categorías, puedes mostrar un mensaje o dejar vacío
            echo "<option value=''>No hay categorías disponibles</option>";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
    </select>
</div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_beb" name="btn_registrar_beb">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para CONSULTAR BEBIDA -->
<div class="modal fade" id="md_consultar_bebida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_consultar_bebida" name="frm_consultar_bebida" method="post">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Consultar Bebida</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="txt_beb_cod" class="form-label">Código</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="txt_beb_cod" name="txt_beb_cod" placeholder="Código de la Bebida" maxlength="5" autofocus/>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn" style="background-color: #ffb347;" id="btn_consultar_beb" name="btn_consultar_beb">Nueva Consulta</button>
                            </div>

                            <div class="col-md-8">
                                <h5 class="card-title mt-2">Descripción</h5>
                                <p class="lbl_bebida card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Stock</h5>
                                <p class="lbl_stock card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Precio</h5>
                                <p class="lbl_precio card-text">&nbsp;</p>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="md_filtrar_bebida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_filtrar_bebida" name="frm_filtrar_bebida" method="post">
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Filtrar Bebida</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="txt_valor_bebida" class="form-label">Valor de Búsqueda</label>
                            <input type="text" class="form-control" id="txt_valor_bebida" name="txt_valor_bebida" placeholder="Valor a buscar" autofocus />
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn" style="background-color: #ffb347;" id="btn_filtrar_bebida" name="btn_filtrar_bebida">Filtrar</button>
                        </div>
                    </div>
                    <div id="tabla_bebida" class="mt-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>


