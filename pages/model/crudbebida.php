<?php

class CRUDBebida extends Conexion {
    public function ListarBebida() {
        $arr_beb = null;

        $cn = $this->Conectar();

        $sql = "call sp_listar_bebida()";

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_beb = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_beb;
    }

    public function BorrarBebida($beb_id) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_borrar_bebida(:beb_id);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":beb_id", $beb_id, PDO::PARAM_INT);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function EditarBebida(Bebida $bebida) {
        try {
            $cn = $this->Conectar();
    
            // Asegúrate de incluir todos los parámetros necesarios para el procedimiento almacenado
            $sql = "call sp_editar_bebida(:beb_id, :beb_nom, :beb_stock, :beb_precio, :beb_categoria_id);";
    
            $snt = $cn->prepare($sql);
    
            // Vinculación de parámetros
            $snt->bindParam(":beb_id", $bebida->bebida_id, PDO::PARAM_INT);
            $snt->bindParam(":beb_nom", $bebida->bebida_desc, PDO::PARAM_STR);
            $snt->bindParam(":beb_stock", $bebida->bebida_stock, PDO::PARAM_INT);
            $snt->bindParam(":beb_precio", $bebida->bebida_precio, PDO::PARAM_STR);
            $snt->bindParam(":beb_categoria_id", $bebida->bebida_categoria_id, PDO::PARAM_INT);
    
            // Ejecución de la consulta
            $snt->execute();
    
            // Opcional: Verificar el número de filas afectadas
            $nr = $snt->rowCount();
    
            // Cerrar la conexión
            $cn = null;
    
            return $nr; // Retorna el número de filas afectadas (opcional)
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
    public function RegistrarBebida(Bebida $bebida) {
        try {
            $cn = $this->Conectar();
    
            $sql = "call sp_registrar_bebida(:beb_nom, :beb_stock, :beb_precio, :beb_categoria_id);";
            $snt = $cn->prepare($sql);
    
            // Asegúrate de que todos los campos estén correctamente asignados
            $snt->bindParam(":beb_nom", $bebida->bebida_desc, PDO::PARAM_STR);
            $snt->bindParam(":beb_stock", $bebida->bebida_stock, PDO::PARAM_INT);
            $snt->bindParam(":beb_precio", $bebida->bebida_precio, PDO::PARAM_STR);
            $snt->bindParam(":beb_categoria_id", $bebida->bebida_categoria_id, PDO::PARAM_INT); // Añadir esto
    
            $snt->execute();
    
            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }
    
    
    

    public function FiltrarBebida($valor) {
        $arr_beb = null;

        $cn = $this->Conectar();

        $sql = "call sp_filtrar_bebida(:valor);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);

        $snt->execute();

        $arr_beb = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();

        if ($nr > 0) {
            echo "<table class='table table-hover table-striped mb-0 table-bordered'>";
            echo "<thead class='table-warning'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Descripción</th>";
            echo "<th>Stock</th>";
            echo "<th>Precio</th>";
            echo "</tr>";
            echo "</thead>";

            foreach ($arr_beb as $beb) {
                echo "<tr>";
                echo "<td>" . $beb->bebida_id . "</td>";
                echo "<td>" . $beb->bebida_desc . "</td>";
                echo "<td>" . $beb->bebida_stock . "</td>";
                echo "<td>" . $beb->bebida_precio . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
            echo "No existen registros.";
            echo "</div>";
        }

        $cn = null; 
    }

    public function ConsultarBebidaPorCodigo($beb_id) {
        $arr_beb = null;

        $cn = $this->Conectar();

        $sql = "call sp_mostrar_bebida_por_codigo(:beb_id);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":beb_id", $beb_id, PDO::PARAM_INT);

        $snt->execute();

        $nr = $snt->rowCount();

        if($nr>0){
            $arr_beb = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        echo json_encode($arr_beb);
    }
    
}

?>