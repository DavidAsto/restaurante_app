<?php
    include ("../includes/cargar_clases.php");

    $crudcomida = new CRUDComida();

    if(isset($_POST["valor"])){
        $valor = $_POST["valor"];
<<<<<<< HEAD

        $crudcomida->FiltrarComida($valor);
    }
    ?>

=======
        $crudcomida->FiltrarComida($valor);
    }
>>>>>>> 5ae995f82bb435f662c96f6f8eeaca5753473ab3
