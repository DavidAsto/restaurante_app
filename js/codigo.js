// Iniciar los eventos en JQuery    
$(function(){  
    setTimeout(() => {
        const toast = document.querySelector('.toast1');
        if (toast) {
            toast.style.opacity = '0';
            setTimeout(() => {
                toast.remove();
            }, 500); // Espera que termine la transición
        }
    }, 3000);

    //Define los eventos a trabajar en la pagina
    //Evento click del boton mostrar de la pagina listar_comida.php

    //Acción al presionar el botón de INFORMACION
    $(".reg_comida .btn_mostrar").click(function(e){
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        let com = $(this).closest(".reg_comida").children(".com").text();
        let cd = $(this).closest(".reg_comida").children(".cd").text();
        let cp = $(this).closest(".reg_comida").children(".cp").text();

        $("#md_mostrar .lbl_codcom").text(codcom);
        $("#md_mostrar .lbl_com").text(com);
        $("#md_mostrar .lbl_cd").text(cd);
        $("#md_mostrar .lbl_cp").text(cp);

        //$("#md_mostrar .btn_mostrar").attr("href", "../controller/ctr_mostrar_com.php?codcom=" + codcom);

        $("#md_mostrar").modal("show");
    });

    //Acción al presionar el botón de ELIMINAR
    $(".reg_comida .btn_eliminar").click(function(e){
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        let com = $(this).closest(".reg_comida").children(".com").text();

        $("#md_borrar .lbl_codcom").text(codcom);
        $("#md_borrar .lbl_com").text(com);

        $("#md_borrar .btn_borrar").attr("href", "../controller/ctr_borrar_com.php?codcom=" + codcom);

        $("#md_borrar").modal("show");
    });

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
    
    //Acción al presionar el botón de Registrar
    $(".reg_con_fil .btn_registrar").click(function(e){
        $("#md_registrar").modal("show");
    });

    //Acción al presionar el botón de Filtrar
    $(".reg_con_fil .btn_filtrar").click(function(e){
        $("#md_filtrar").modal("show");
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

    /*$(".reg_comida .btn_mostrar").click(function(e){
        let codcom = $(this).closest(".reg_comida").children(".codcom").text();
        
        location.href = "mostrar_comida.php?codcom=" + codcom;
    });*/
});