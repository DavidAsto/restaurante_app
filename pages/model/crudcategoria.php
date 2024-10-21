<?php
class CRUDCategoria extends Conexion {
    public function ListarCategoria() {
        $arr_cat = null;

        $cn = $this->Conectar();

        $sql = "call sp_listar_categoria()"; // Asegúrate de que este procedimiento existe

        $snt = $cn->prepare($sql);

        $snt->execute();

        $arr_cat = $snt->fetchAll(PDO::FETCH_OBJ);

        $cn = null;

        return $arr_cat;
    }

    public function MostrarCategoriaPorCodigo($cod_cat) {
        $arr_cat = null;

        $cn = $this->Conectar();

        $sql = "call sp_mostrar_categoria_por_codigo(:cod_cat);";

        $snt = $cn->prepare($sql);

        $snt->bindParam(":cod_cat", $cod_cat, PDO::PARAM_INT);

        $snt->execute();

        $nr = $snt->rowCount();

        if($nr > 0){
            $arr_cat = $snt->fetch(PDO::FETCH_OBJ);
        }

        $cn = null;

        echo json_encode($arr_cat);
    }

    public function BorrarCategoria($cod_cat) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_borrar_categoria(:cod_cat);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cod_cat", $cod_cat, PDO::PARAM_INT);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function EditarCategoria(Categoria $categoria) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_editar_categoria(:cat_id, :cat_nom);"; // Sin descripción

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cat_id", $categoria->categoria_id);
            $snt->bindParam(":cat_nom", $categoria->categoria_nombre);

            $snt->execute();

            $nr = $snt->rowCount();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function RegistrarCategoria(Categoria $categoria) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_registrar_categoria(:cat_nom);"; // Sin descripción

            $snt = $cn->prepare($sql);

            $snt->bindParam(":cat_nom", $categoria->categoria_nombre);

            $snt->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    public function FiltrarCategoria($valor) {
        $arr_categoria = null;

        $cn = $this->Conectar();

        $sql = "SELECT * FROM categoria WHERE categoria_nombre LIKE :valor";
        $snt = $cn->prepare($sql);
        $valor = '%' . $valor . '%';
        $snt->bindParam(":valor", $valor, PDO::PARAM_STR);
        $snt->execute();

        $arr_categoria = $snt->fetchAll(PDO::FETCH_OBJ);
        $nr = $snt->rowCount();

        if ($nr > 0) {
            echo "<table class='table table-hover table-striped mb-0 table-bordered'>";
            echo "<thead class='table-warning'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nombre</th>";
            echo "</tr>";
            echo "</thead>";

            foreach ($arr_categoria as $categoria) {
                echo "<tr>";
                echo "<td>" . $categoria->categoria_id . "</td>";
                echo "<td>" . $categoria->categoria_nombre . "</td>";
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
