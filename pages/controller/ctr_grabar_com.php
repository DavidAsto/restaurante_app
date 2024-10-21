<?php
<<<<<<< HEAD

session_start();

include ("../includes/cargar_clases.php");
=======
    session_start();
    include ("../includes/cargar_clases.php");
>>>>>>> 5ae995f82bb435f662c96f6f8eeaca5753473ab3

    $crudcomida = new CRUDComida();

    if(isset($_POST["btn_registrar_com"])){
        $comida = new Comida();

        $comida->comida_nombre = $_POST["txt_com_nom"];
        $comida->comida_disponibilidad = $_POST["txt_com_dis"];
        $comida->comida_precio = $_POST["txt_com_pre"];

        $tipo = $_POST["txt_tipo"];
<<<<<<< HEAD

=======
        
>>>>>>> 5ae995f82bb435f662c96f6f8eeaca5753473ab3
        if($tipo == "r"){
            $_SESSION['mensaje'] = '¡Registro agregado!';
            $crudcomida->RegistrarComida($comida);
        }else if($tipo == "e"){
<<<<<<< HEAD
            $_SESSION['mensaje'] = '¡Registro actualizado!';
            $comida->comida_id = $_POST["txt_com_cod"];
            $crudcomida->EditarComida($comida);
        }

        header("location: ../view/listar_comida.php");
        
        exit();
    }else{
        echo "fail";
    }
    ?>


=======
            $comida->comida_id = $_POST["txt_com_cod"];
            $crudcomida->EditarComida($comida);
        }
        header("location: ../view/listar_comida.php");
    }else{
        echo "fail";
    }
>>>>>>> 5ae995f82bb435f662c96f6f8eeaca5753473ab3
