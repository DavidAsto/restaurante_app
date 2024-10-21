// Iniciar los eventos en JQuery    
$(function() {  
    // Define los eventos a trabajar en la página

    // Evento click del botón mostrar de la página listar_comida.php
    // Acción al presionar el botón de INFORMACIÓN

    setTimeout(() => {
        const toast = document.querySelector('.toast1');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(() => {
                toast.remove();
            }, 500); // Espera que termine la transición
        }
    }, 3000);
    
    $(".reg_comida .btn_mostrar").click(function(e) {
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        let com = $(this).closest(".reg_comida").children(".com").text();
        let cd = $(this).closest(".reg_comida").children(".cd").text();
        let cp = $(this).closest(".reg_comida").children(".cp").text();

        $("#md_mostrar .lbl_codcom").text(codcom);
        $("#md_mostrar .lbl_com").text(com);
        $("#md_mostrar .lbl_cd").text(cd);
        $("#md_mostrar .lbl_cp").text(cp);

        $("#md_mostrar").modal("show");
    });

    // Acción al presionar el botón de ELIMINAR
    $(".reg_comida .btn_eliminar").click(function(e){
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        let com = $(this).closest(".reg_comida").children(".com").text();

        $("#md_borrar .lbl_codcom").text(codcom);
        $("#md_borrar .lbl_com").text(com);

        $("#md_borrar .btn_borrar").attr("href", "../controller/ctr_borrar_com.php?codcom=" + codcom);

        $("#md_borrar").modal("show");
    });
     //ACCION PARA CONSULTAR 

     $(".reg_con_fil .btn_consultar").click(function(e){
        $("#md_consultar").modal("show");

        $("#frm_consultar_com #txt_com_nom").focusout(function(e){
            e.preventDefault();
    
            let codcom = $(this).val();
    
            if (codcom !== ""){
                $.ajax({
                    url: '../controller/ctr_consultar_com.php',//PONER LA RUTA ASI TAL CUAL , POR MAS QUE EL VISUAL STUDIO
                    type: 'POST',                                   // TE PONGA OTRA COSA, 
                    data: {cod_com: codcom},
                    success: function(rpta){
                        let rp = JSON.parse(rpta);
    
                        if (rp) {
                            $(".lbl_com").html(rp.comida_nombre);
                            $(".lbl_cp").html(rp.comida_precio);
                            $(".lbl_cd").html(rp.comida_disponibilidad);
                        } else {
                            //poner el modal de un error                         
                            $("#txt_com_nom").val("");
    
                            let vacio = "&nbsp;";
    
                            $(".lbl_com").html(vacio);
                            $(".lbl_cp").html(vacio);
                            $(".lbl_cd").html(vacio);
    
                            $("#txt_com_nom").focus();
                        }
                    }
                });
            }
        });

        $("#btn_consultar_com").click(function(e) {

            e.preventDefault();
            let vacio = "&nbsp;";

            $(".lbl_com").html(vacio);
            $(".lbl_cp").html(vacio);
            $(".lbl_cd").html(vacio);

            $("#txt_com_nom").val("");

            $("#txt_com__nom").focus();
        });
    });


    // Acción al presionar el botón de EDITAR

       //Acción al presionar el botón de EDITAR
       $(".reg_comida .btn_editar").click(function(e){
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        let com = $(this).closest(".reg_comida").children(".com").text();
        let cd = $(this).closest(".reg_comida").children(".cd").text();
        let cp = $(this).closest(".reg_comida").children(".cp").text();

        document.getElementById('txt_com_cod').value = codcom;
        document.getElementById('txt_com_nom').value = com;
        document.getElementById('txt_com_dis').value = cd;
        document.getElementById('txt_com_pre').value = cp;

        //$("#md_editar .btn_editar").attr("href", "../controller/ctr_mostrar_com.php?codcom=" + codcom);

        $("#md_editar").modal("show");
    });
    
    
    // Acción al presionar el botón de Registrar
    $(".reg_con_fil .btn_registrar").click(function(e) {
        $("#md_registrar").modal("show");
    });

    // Acción al presionar el botón de Filtrar
    $(".reg_con_fil .btn_filtrar").click(function(e) {
        $("#md_filtrar").modal("show");
    });
    $(".reg_con_cl .btn_filtrar").click(function(e) {
        $("#md_filtrar_cliente").modal("show");
    });
    
    
    //ACCION PARA FILTRAR

    $("#frm_filtrar_com #btn_filtrar").on("click",function(e){
        e.preventDefault();

        var valor = $("#txt_valor").val();

        if(valor!=""){
            $.post("../controller/ctr_filtrar_com.php",
            {valor: valor},
            function(rpta){
                $("#tabla").html(rpta);
            });
        }else{
            $("#tabla").html("");

            $("#md_error").modal("show");

            $("#txt_valor").focus();
        }

        var myModal = bootstrap.Modal.getInstance(document.getElementById("md_filtrar"));
        myModal.handleUpdate();
    });

    $("#md_filtrar #btn_fcerrar").click(function(e){
        document.getElementById('txt_valor').value = "";
        $("#tabla").html("");
    })

    // Acción al presionar el botón de INFORMACIÓN para los clientes
    $(".reg_cliente .btn_mostrar_cliente").click(function(e) {
    
        let codcli = $(this).closest(".reg_cliente").children(".codcli").text();
        let cli = $(this).closest(".reg_cliente").children(".cli").text();
        let cor = $(this).closest(".reg_cliente").children(".cor").text();
        let tel = $(this).closest(".reg_cliente").children(".tel").text();
        let dniCli= $(this).closest(".reg_cliente").children(".dni").text();

    
        $("#md_mostrar_cliente .lbl_codcli").text(codcli);
        $("#md_mostrar_cliente .lbl_cliente").text(cli);
        $("#md_mostrar_cliente .lbl_email").text(cor);
        $("#md_mostrar_cliente .lbl_tel").text(tel);
        $("#md_mostrar_cliente .lbl_dni").text(dniCli);

    
        $("#md_mostrar_cliente").modal("show");
    });
    $(".reg_con_cl .btn_registrar_cliente").click(function(e) {
        $("#md_registrar_cliente").modal("show");
    });

$(".reg_cliente .btn_editar").click(function(e) {
    // Obtener los datos del cliente de la fila seleccionada
    let codCli = $(this).closest(".reg_cliente").children(".codcli").text();
    let nomCli = $(this).closest(".reg_cliente").children(".cli").text();
    let telCli = $(this).closest(".reg_cliente").children(".tel").text();
    let emailCli = $(this).closest(".reg_cliente").children(".cor").text();
    let dniCli = $(this).closest(".reg_cliente").children(".dni").text();


    // Asignar los valores a los campos del modal
    document.getElementById('txt_cli_cod').value = codCli;
    document.getElementById('txt_cli_nom').value = nomCli;
    document.getElementById('txt_cli_cel').value = telCli;
    document.getElementById('txt_cli_cor').value = emailCli;
    document.getElementById('txt_cli_dni').value = dniCli;




    // Mostrar el modal
    $("#md_editar_cliente").modal("show");
});

$(".reg_cliente .btn_eliminar").click(function(e){
    let codcli = $(this).closest(".reg_cliente").children(".codcli").text();
    let cli = $(this).closest(".reg_cliente").children(".cli").text();

    $("#md_borrar_cliente .lbl_codcli").text(codcli);
    $("#md_borrar_cliente .lbl_cliente").text(cli);

    $("#md_borrar_cliente .btn_borrar_cliente").attr("href", "../controller/ctr_borrar_cli.php?codcli=" + codcli);

    $("#md_borrar_cliente").modal("show");
});



$(".reg_con_cl .btn_consultar").click(function(e) {
    $("#md_consultar_cliente").modal("show"); // Cambiar el ID del modal a consultar cliente

    $("#frm_consultar_cli #txt_cli_cod").focusout(function(e) {
        e.preventDefault();

        let codcli = $(this).val(); // Cambiar a codcli para el código del cliente

        if (codcli !== "") {
            $.ajax({
                url: '../controller/ctr_consultar_cli.php', // Actualiza la ruta al controlador de cliente
                type: 'POST',
                data: {cod_cli: codcli}, // Cambiar cod_com a cod_cli
                success: function(rpta) {   
                    let rp = JSON.parse(rpta);

                    if (rp) {
                        $(".lbl_cliente").html(rp.cliente_nombre); // Cambiar el nombre de la propiedad
                        $(".lbl_tel").html(rp.cliente_celular); // Cambiar el nombre de la propiedad
                        $(".lbl_email").html(rp.cliente_correo); // Cambiar el nombre de la propiedad
                    } else {
                        // Mostrar modal de error
                        $("#txt_cli_cod").val("");

                        let vacio = "&nbsp;";

                        $(".lbl_cliente").html(vacio);
                        $(".lbl_tel").html(vacio);
                        $(".lbl_email").html(vacio);

                        $("#txt_cli_cod").focus(); // Cambiar el ID del campo
                    }
                }
            });
        }
    });

    $("#btn_consultar_cli").click(function(e) { // Cambiar ID del botón
        e.preventDefault();
        let vacio = "&nbsp;";

        $(".lbl_cliente").html(vacio);
        $(".lbl_tel").html(vacio);
        $(".lbl_email").html(vacio);

        $("#txt_cli_cod").val(""); // Cambiar el ID del campo

        $("#txt_cli__cod").focus(); // Cambiar el ID del campo
    });
});

$("#frm_filtrar_cliente #btn_filtrar_cliente").on("click", function(e) {
    e.preventDefault();

    var valor_cliente = $("#txt_valor_cliente").val();

    if (valor_cliente != "") {
        $.post("../controller/ctr_filtrar_cli.php", { valor: valor_cliente }, function(rpta) {
            $("#tabla_cliente").html(rpta);
        });
    } else {
        $("#tabla_cliente").html("");

        $("#md_error").modal("show");

        $("#txt_valor_cliente").focus();
    }

    var myModalCliente = bootstrap.Modal.getInstance(document.getElementById("md_filtrar_cliente"));
    myModalCliente.handleUpdate();
});

$("#md_filtrar_cliente #btn_fcerrar_cliente").click(function(e) {
    document.getElementById('txt_valor_cliente').value = "";
    $("#tabla_cliente").html("");
});



$(".reg_bebida .btn_eliminar_bebida").click(function(e){
    let codbebida = $(this).closest(".reg_bebida").children(".codbebida").text();
    let bebida = $(this).closest(".reg_bebida").children(".bebida").text();

    $("#md_borrar_bebida .lbl_codbebida").text(codbebida);
    $("#md_borrar_bebida .lbl_bebida").text(bebida);

    $("#md_borrar_bebida .btn_borrar_bebida").attr("href", "../controller/ctr_borrar_beb.php?codbebida=" + codbebida);

    $("#md_borrar_bebida").modal("show");
});


$(".reg_bebida .btn_editar_bebida").click(function(e) {
    let codbebida = $(this).closest(".reg_bebida").find(".codbebida").text(); // Acceder a la clase correcta
    let bebida = $(this).closest(".reg_bebida").find(".desc").text(); // Acceder a la clase correcta
    let stock = $(this).closest(".reg_bebida").find(".stock").text(); // Si no tienes esta clase, puedes eliminar esta línea
    let precio = $(this).closest(".reg_bebida").find(".precio").text(); // Acceder a la clase correcta

    document.getElementById('txt_beb_cod').value = codbebida;
    document.getElementById('txt_beb_nom').value = bebida;
    document.getElementById('txt_beb_stock').value = stock; // Asegúrate de que este campo exista en tu HTML
    document.getElementById('txt_beb_pre').value = precio;

    $("#md_editar_bebida").modal("show");
});

$(".reg_bebida .btn_mostrar_bebida").click(function(e) {
    let codbebida = $(this).closest(".reg_bebida").children(".codbebida").text();
    let bebida = $(this).closest(".reg_bebida").children(".desc").text();
    let descripcion = $(this).closest(".reg_bebida").children(".descripcion").text(); // Asegúrate de tener esta clase en tu HTML
    let precio = $(this).closest(".reg_bebida").children(".precio").text();
    let stock = $(this).closest(".reg_bebida").children(".stock").text();
    let categoria = $(this).closest(".reg_bebida").children(".categoria").text(); // Obtener el nombre de la categoría

    // Asignar los valores al modal
    $("#md_mostrar_bebida .lbl_codbebida").text(codbebida);
    $("#md_mostrar_bebida .lbl_bebida").text(bebida);
    $("#md_mostrar_bebida .lbl_desc").text(descripcion); // Asegúrate de que este campo exista en tu HTML
    $("#md_mostrar_bebida .lbl_precio").text(precio);
    $("#md_mostrar_bebida .lbl_stock").text(stock);
    $("#md_mostrar_bebida .lbl_categoria").text(categoria); // Asignar la categoría al modal

    // Mostrar el modal
    $("#md_mostrar_bebida").modal("show");
});


// Acción al presionar el botón de Registrar Bebida
$(".reg_con_bebida .btn_registrar_bebida").click(function(e) {
    $("#md_registrar_bebida").modal("show");
});

$(".reg_con_bebida .btn_consultar_bebida").click(function(e) {
    $("#md_consultar_bebida").modal("show");

    $("#frm_consultar_bebida #txt_beb_cod").focusout(function(e) {
        e.preventDefault();

        let bebid = $(this).val();

        if (bebid !== "") {
            $.ajax({
                url: '../controller/ctr_consultar_beb.php', // Asegúrate de que esta sea la ruta correcta
                type: 'POST',
                data: { beb_id: bebid },
                success: function(rpta) {
                    let rp = JSON.parse(rpta);

                    if (rp) {
                        $(".lbl_bebida").html(rp.bebida_desc);
                        $(".lbl_stock").html(rp.bebida_stock);
                        $(".lbl_precio").html(rp.bebida_precio);
                    } else {
                        // Manejo de error
                        $("#txt_beb_cod").val("");

                        let vacio = "&nbsp;";

                        $(".lbl_bebida").html(vacio);
                        $(".lbl_stock").html(vacio);
                        $(".lbl_precio").html(vacio);

                        $("#txt_beb_cod").focus();
                    }
                }
            });
        }
    });

    $("#btn_consultar_beb").click(function(e) {
        e.preventDefault();
        let vacio = "&nbsp;";

        $(".lbl_bebida").html(vacio);
        $(".lbl_stock").html(vacio);
        $(".lbl_precio").html(vacio);

        $("#txt_beb_cod").val("");
        $("#txt_beb_cod").focus();
    });
});

$(".reg_con_bebida .btn_filtrar_bebida").click(function(e) {
    $("#md_filtrar_bebida").modal("show");
});

$("#frm_filtrar_bebida #btn_filtrar_bebida").on("click", function(e) {
    e.preventDefault();

    var valor_bebida = $("#txt_valor_bebida").val();

    if (valor_bebida != "") {
        $.post("../controller/ctr_filtrar_beb.php", { valor: valor_bebida }, function(rpta) {
            $("#tabla_bebida").html(rpta);
        });
    } else {
        $("#tabla_bebida").html("");

        $("#md_error").modal("show");
        $("#txt_valor_bebida").focus();
    }

    var myModalBebida = bootstrap.Modal.getInstance(document.getElementById("md_filtrar_bebida"));
    myModalBebida.handleUpdate();
});


//categoria #TODO

$(".reg_categoria .btn_eliminar_categoria").click(function(e) {
    let codcat = $(this).closest(".reg_categoria").children(".codcat").text();
    let cat = $(this).closest(".reg_categoria").children(".cat").text();

    $("#md_borrar_categoria .lbl_codcat").text(codcat);
    $("#md_borrar_categoria .lbl_categoria").text(cat);

    $("#md_borrar_categoria .btn_borrar_categoria").attr("href", "../controller/ctr_borrar_cat.php?codcat=" + codcat);

    $("#md_borrar_categoria").modal("show");
});



    
});
