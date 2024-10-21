<!-- Modal para BORRAR -->
<div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-danger" id="staticBackdropLabel">Borrar</h4>
            </div>
            <div class="modal-body mborrar">
                <div>
                    <h5 class="card-title">¿Seguro de borrar el registro?</h5>
                    <p class="card-text">
                        <span class="lbl_com"></span> (<span class="lbl_codcom"></span>)
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                <a href="#" class="btn_borrar btn btn-danger">Borrar</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal para la INFORMACION -->
<div class="modal fade" id="md_mostrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffb347;">
                <h4 class="modal-title" id="staticBackdropLabel">  Informacion</h4>
            </div>
            <div class="modal-body justify-content-center">
                <div class="row border border-1 rounded px-3 py-4 my-1 mx-1">
                    <div class="col-6">
                        <h5 class="card-title">Código</h5>
                        <p class="card-text">
                            <span class="lbl_codcom"></span>
                        </p>
                        <h5 class="card-title">Precio</h5>
                        <p class="card-text">
                            S/<span class="lbl_cp"></span>
                        </p>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">Comida</h5>
                        <p class="card-text">
                            <span class="lbl_com"></span>
                        </p>
                        <h5 class="card-title">Disponible</h5>
                        <p class="card-text">
                            <span class="lbl_cd"></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--MOdal para CONSULTAR-->
<div class="modal fade" id="md_consultar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_consultar_com" name="frm_consultar_com" method="post">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Consultar Comida</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="txt_com_nom" class="form-label">Codigo</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="txt_com_nom" name="txt_com_nom" placeholder ="Comida" maxlength="5" autofocus/>
                            </div>
                            <div class="col-md-8">
                                <button type="button" class="btn" style="background-color: #ffb347;" id="btn_consultar_com" name="btn_consultar_com">Nueva Consulta</button>
                            </div>

                            <div class="col-md-8">
                                <h5 class="card-title mt-2">Comida</h5>
                                <p class="lbl_com card-text">
                                    &nbsp;
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Precio</h5>
                                <p class="lbl_cp card-text">
                                    &nbsp;
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="card-title mt-2">Disponible</h5>
                                <p class="lbl_cd card-text">
                                    &nbsp;
                                </p>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para EDITAR -->
<div class="modal fade" id="md_editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_editar_com" name="frm_editar_com" method="post" action="../controller/ctr_grabar_com.php" autocomplete="off">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="e"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">  Editar</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="txt_com_cod" class="form-label">Código</label>
                                <input type="text" class="form-control" id="txt_com_cod" name="txt_com_cod" placeholder ="Código" maxlength="5" readonly value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_com_nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_com_nom" name="txt_com_nom" placeholder ="Comida" maxlength="50" value=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_com_dis" class="form-label mt-2">Disponible</label>
                                <input type="text" class="form-control" id="txt_com_dis" name="txt_com_dis" placeholder ="Si/no" maxlength="2" value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_com_pre" class="form-label mt-2">Precio</label>
                                <input type="number" step="0.1" class="form-control" id="txt_com_pre" name="txt_com_pre" placeholder ="Precio" maxlength="10" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_com" name="btn_registrar_com">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para REGISTRAR -->
<div class="modal fade" id="md_registrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_registrar_com" name="frm_registrar_com" method="post" action="../controller/ctr_grabar_com.php" autocomplete="off">
                <input type="hidden" id="txt_tipo" name="txt_tipo" value="r"/>
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Registrar</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="txt_com_nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="txt_com_nom" name="txt_com_nom" placeholder ="Comida" maxlength="50" value=""/>
                            </div>
                            <div class="col-md-4">
                                <label for="txt_com_dis" class="form-label mt-2">Disponible</label>
                                <input type="text" class="form-control" id="txt_com_dis" name="txt_com_dis" placeholder ="Si/no" maxlength="2" value=""/>
                            </div>
                            <div class="col-md-8">
                                <label for="txt_com_pre" class="form-label mt-2">Precio</label>
                                <input type="number" step="0.1" class="form-control" id="txt_com_pre" name="txt_com_pre" placeholder ="Precio" maxlength="10" value=""/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn" style="background-color: #ffb347;" id="btn_registrar_com" name="btn_registrar_com">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal para FILTRAR -->
<div class="modal fade" id="md_filtrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <form id="frm_filtrar_com" name="frm_filtrar_com" method="post" action="">
                <div class="modal-header" style="background-color: #ffb347;">
                    <h4 class="modal-title" id="staticBackdropLabel">Filtrar</h4>
                </div>
                <div class="modal-body justify-content-center">
                    <div class="row border border-1 rounded px-4 py-4 my-1 mx-1">
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button" id="btn_filtrar" name="btn_filtrar"><i class="fa-solid fa-magnifying-glass" style="color: #000000;"></i></button>
                            <input type="text" class="form-control" id="txt_valor" name="txt_valor" maxlength="30" placeholder="Valor a buscar..." aria-label="Example text with button addon" aria-describedby="button-addon1">
                        </div>
                        <div class="px-2">
                            <div id="tabla"></div>
                        </div>
                    </div> 
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" id="btn_fcerrar" class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para ERROR -->
<div class="modal fade" id="md_error"  tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header ps-3">
                <h4 class="modal-title text-danger" id="staticBackdropLabel">Error</h4>
            </div>
            <div class="modal-body">
                <div>
                    <h6 class="card-title">El campo está vacio</h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>