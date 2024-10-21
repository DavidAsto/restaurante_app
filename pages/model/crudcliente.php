<?php
class CRUDCliente extends Conexion {
    public function ListarCliente() {
        $arr_cli = null;

        $cn = $this->Conectar();

        $sql = "call sp_listar_cliente()"; // Asegúrate de que este procedimiento existe

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_cli = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_cli;
    }

    public function MostrarClientePorCodigo($cod_cli) {
        $arr_cli = null;

        $cn = $this->Conectar();

        $sql = "call sp_mostrar_cliente_por_codigo(:cod_cli);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":cod_cli", $cod_cli, PDO::PARAM_INT);

        $snt->execute();

        $nr = $snt->rowCount();

        if($nr>0){
            $arr_cli = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        echo json_encode($arr_cli);
    }

    public function BorrarCliente($cod_cli) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_borrar_cliente(:cod_cli);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cod_cli", $cod_cli, PDO::PARAM_INT);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function EditarCliente(Cliente $cliente) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_editar_cliente(:cli_id, :cli_nom, :cli_dni, :cli_celular, :cli_correo);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cli_id", $cliente->cliente_id);
            $snt->bindParam(":cli_nom", $cliente->cliente_nombre);
            $snt->bindParam(":cli_dni", $cliente->cliente_dni);
            $snt->bindParam(":cli_celular", $cliente->cliente_celular);
            $snt->bindParam(":cli_correo", $cliente->cliente_correo);

            $snt->execute();

            $nr = $snt->rowCount();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function RegistrarCliente(Cliente $cliente) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_registrar_cliente(:cli_nom, :cli_dni, :cli_celular, :cli_correo);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cli_nom", $cliente->cliente_nombre);
            $snt->bindParam(":cli_dni", $cliente->cliente_dni);
            $snt->bindParam(":cli_celular", $cliente->cliente_celular);
            $snt->bindParam(":cli_correo", $cliente->cliente_correo);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarCliente($valor) {
        $arr_cliente = null;
    
        $cn = $this->Conectar();
    
        $sql = "SELECT * FROM cliente WHERE cliente_nombre LIKE :valor";
        $snt = $cn->prepare($sql);
        $valor = '%' . $valor . '%';
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $snt->execute();
    
        $arr_cliente = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();
    
        if ($nr > 0) {
            echo "<table class='table table-hover table-striped mb-0 table-bordered'>";
            echo "<thead class='table-warning'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "<th>DNI</th>";
            echo "<th>Celular</th>";
            echo "<th>Correo</th>";

            echo "</tr>";
            echo "</thead>";
    
            foreach ($arr_cliente as $cliente) {
                echo "<tr>";
                echo "<td>" . $cliente->cliente_id . "</td>";
                echo "<td>" . $cliente->cliente_nombre . "</td>";
                echo "<td>" . $cliente->cliente_dni . "</td>";
                echo "<td>" . $cliente->cliente_celular . "</td>";
                echo "<td>" . $cliente->cliente_correo . "</td>";


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
    
}
?>
