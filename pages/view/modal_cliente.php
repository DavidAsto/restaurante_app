<!-- Modal para BORRAR -->
<div class="modal fade" id="md_borrar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="borrarClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="staticBackdropLabelCliente">Borrar Cliente</h4>
                <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x" style="color: #000000;"></i></button>
            </div>
            <div class="modal-body mborrar">
                <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                <p class="card-text">
                    <span class="lbl_cliente"></span> (<span class="lbl_codcli"></span>)
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                <a href="#" class="btn_borrar_cliente btn btn-danger">Borrar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal para la INFORMACION -->
<div class="modal fade" id="md_mostrar_cliente" tabindex="-1" aria-labelledby="mostrarClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffb347;">
                <h4 class="modal-title" id="mostrarClienteLabel">Información del Cliente</h4>
            </div>
            <div class="modal-body justify-content-center">
                <div class="row border border-1 rounded px-3 py-4 my-1 mx-1">
                    <div class="col-6">
                        <h5 class="card-title">Código</h5>
                        <p class="card-text"><span class="lbl_codcli"></span></p>
                        <h5 class="card-title">Teléfono</h5>
                        <p class="card-text"><span class="lbl_tel"></span></p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Nombre</h5>
                        <p class="card-text"><span class="lbl_cliente"></span></p>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text"><span class="lbl_email"></span></p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Dni</h5>
                        <p class="card-text"><span class="lbl_dni"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal para EDITAR -->
<div class="modal fade" id="md_editar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_editar_cli" name="frm_editar_cli" method="post" action="../controller/ctr_grabar_cli.php" autocomplete="off">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="e"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="editarClienteLabel">Editar Cliente</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="txt_cli_cod" class="form-label">Código</label>
                                <input type="text" class="form-control" id="txt_cli_cod" name="txt_cli_cod" placeholder="Código" maxlength="5" readonly value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_cli_nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_cli_nom" name="txt_cli_nom" placeholder="Nombre" maxlength="50" value=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_cli_cel" class="form-label mt-2">Teléfono</label>
                                <input type="text" class="form-control" id="txt_cli_cel" name="txt_cli_cel" placeholder="Teléfono" maxlength="15" value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_cli_cor" class="form-label mt-2">Email</label>
                                <input type="email" class="form-control" id="txt_cli_cor" name="txt_cli_cor" placeholder="Email" maxlength="100" value=""/>
                            </div>
                            <div class="col-md-12">
                                <label for="txt_cli_dni" class="form-label mt-2">DNI</label>
                                <input type="text" class="form-control" id="txt_cli_dni" name="txt_cli_dni" placeholder="Número de DNI" maxlength="15" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_cli" name="btn_registrar_cli">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal para REGISTRAR -->
<div class="modal fade" id="md_registrar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabelCliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_registrar_cliente" name="frm_registrar_cliente" method="post" action="../controller/ctr_grabar_cli.php" autocomplete="off">
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabelCliente">Registrar Cliente</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="txt_cli_nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_cli_nom" name="txt_cli_nom" placeholder="Nombre del Cliente" maxlength="50" required />
                            </div>
                            <div class="col-md-12">
                                <label for="txt_cli_cor" class="form-label mt-2">Correo</label>
                                <input type="email" class="form-control" id="txt_cli_cor" name="txt_cli_cor" placeholder="Correo Electrónico" maxlength="50" required />
                            </div>
                            <div class="col-md-12">
                                <label for="txt_cli_cel" class="form-label mt-2">Teléfono</label>
                                <input type="text" class="form-control" id="txt_cli_cel" name="txt_cli_cel" placeholder="Número de Teléfono" maxlength="15" required />
                            </div>
                            <div class="col-md-12">
                                <label for="txt_cli_dni" class="form-label mt-2">DNI</label>
                                <input type="text" class="form-control" id="txt_cli_dni" name="txt_cli_dni" placeholder="Número de DNI" maxlength="15" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_cli" name="btn_registrar_cli">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para CONSULTAR -->
<div class="modal fade" id="md_consultar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_consultar_cli" name="frm_consultar_cli" method="post">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Consultar Cliente</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="txt_cli_cod" class="form-label">Código</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="txt_cli_cod" name="txt_cli_cod" placeholder="Código del Cliente" maxlength="5" autofocus/>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn" style="background-color: #ffb347;" id="btn_consultar_cli" name="btn_consultar_cli">Nueva Consulta</button>
                            </div>

                            <div class="col-md-8">
                                <h5 class="card-title mt-2">Nombre</h5>
                                <p class="lbl_cliente card-text">
                                    &nbsp;
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Teléfono</h5>
                                <p class="lbl_tel card-text">
                                    &nbsp;
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Correo</h5>
                                <p class="lbl_email card-text">
                                    &nbsp;
                                </p>
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

<div class="modal fade" id="md_filtrar_cliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabelCliente" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
            <form id="frm_filtrar_cliente" name="frm_filtrar_cliente" method="post" action="">
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabelCliente">Filtrar Cliente</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="btn_filtrar_cliente" name="btn_filtrar_cliente">
                                <i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i>
                            </button>
                            <input type="text" class="form-control" id="txt_valor_cliente" name="txt_valor_cliente" maxlength="30" placeholder="Valor a buscar..." aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="px-2">
                            <div id="tabla_cliente"></div>
                        </div>
                    </div> 
                </div>
            </form>
            <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                </div>
        </div>
    </div>
</div>




