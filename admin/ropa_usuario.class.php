<?php
require_once ('../sistema.class.php');

class RopaUsuario extends sistema {
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO ropa_usuario(id_usuario, nombre_prenda, categoria, color, talla, imagen_url, estado) 
                VALUES(:id_usuario, :nombre_prenda, :categoria, :color, :talla, :imagen_url, :estado);";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        $modificar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE ropa_usuario SET id_usuario = :id_usuario, nombre_prenda = :nombre_prenda, categoria = :categoria, color = :color, talla = :talla, imagen_url = :imagen_url, estado = :estado WHERE id_ropa_usuario = :id_ropa_usuario";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_ropa_usuario', $id, PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        $modificar->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        return $modificar->execute();
    }

    function delete($id) {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM ropa_usuario WHERE id_ropa_usuario = :id_ropa_usuario";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_ropa_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }

    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM ropa_usuario WHERE id_ropa_usuario = :id_ropa_usuario";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_ropa_usuario', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM ropa_usuario";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
