<?php
    class CRUDComida extends Conexion{
        public function ListarComida(){
            $arr_com = null;

            $cn = $this->Conectar();

            $sql = "call sp_listar_comida()";

            $snt = $cn->prepare($sql);

            $snt->execute();

            $arr_com = $snt->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_com;
        }

        public function BorrarComida($cod_com){
            try{
                $cn = $this->Conectar();

                $sql = "call sp_borrar_comida(:cod_com);";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":cod_com",$cod_com, PDO::PARAM_STR, 5);

                $snt->execute();

                $cn = null;
            } catch(PDOException $ex){
                die($ex->getMessage());
            }
        }
        public function EditarComida(Comida $comida){
            try{
                $cn = $this->Conectar();

                $sql = "call sp_editar_comida(:com_id, :com_nom, :com_dis, :com_pre);";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":com_id", $comida->comida_id);
                $snt->bindParam(":com_nom", $comida->comida_nombre);
                $snt->bindParam(":com_dis", $comida->comida_disponibilidad);
                $snt->bindParam(":com_pre", $comida->comida_precio);

                $snt->execute();

                $nr = $snt->rowCount();

                $cn = null;
            } catch(PDOException $ex){
                die($ex->getMessage());
            }
        }
        public function RegistrarComida(Comida $comida){
            try{
                $cn = $this->Conectar();

                $sql = "call sp_registrar_comida(:com_nom, :com_dis, :com_pre);";

                $snt = $cn->prepare($sql);

                $snt->bindParam(":com_nom", $comida->comida_nombre);
                $snt->bindParam(":com_dis", $comida->comida_disponibilidad);
                $snt->bindParam(":com_pre", $comida->comida_precio);

                $snt->execute();

                $cn = null;
            } catch(PDOException $ex){
                die($ex->getMessage());
            }
        }

        public function ConsultarComidaPorCodigo($cod_com) {
            $arr_com = null;

            $cn = $this->Conectar(); 

            $sql = "call sp_mostrar_comida_por_codigo(:cod_com);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cod_com", $cod_com, PDO::PARAM_STR, 5);

            $snt->execute();

            $nr = $snt->rowCount();

            if($nr>0){
                $arr_com = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            echo json_encode($arr_com);
        }


        public function FiltrarComida($valor){
            $arr_com = null;

            $cn = $this->Conectar();

            $sql = "call sp_filtrar_comida(:valor);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);

            $snt->execute();

            $cn = null;

            $arr_com = $snt->fetchAll(PDO::FETCH_OBJ);

            $nr = $snt->rowCount();

            if($nr>0){
                echo "<table class='table table-hover table-striped mb-0 table-bordered'>";
                echo "<thead class='table-warning''>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Disponible</th>";
                echo "<th>Precio</th>";
                echo "</tr>";
                echo "</thead>";

                $i = 0;

                foreach($arr_com as $com){
                    echo "<tr>";
                    echo "<td>".$com->comida_id."</td>";
                    echo "<td>".$com->comida_nombre."</td>";
                    echo "<td>".$com->comida_disponibilidad."</td>";
                    echo "<td>".$com->comida_precio."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                echo "No existen registros.";
                echo "</div>";
            }
            $cn = null; 
        }
    }
?>