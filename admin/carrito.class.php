<?php
require_once ('../sistema.class.php');

class Carrito extends sistema {
    function create($data) {
        $this->conexion();
        $sql = "INSERT INTO carrito(id_usuario, id_ropa_tienda, cantidad) 
                VALUES(:id_usuario, :id_ropa_tienda, :cantidad);";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':id_ropa_tienda', $data['id_ropa_tienda'], PDO::PARAM_INT);
        $modificar->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
        return $modificar->execute();
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE carrito SET id_usuario = :id_usuario, id_ropa_tienda = :id_ropa_tienda, cantidad = :cantidad WHERE id_carrito = :id_carrito";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $modificar->bindParam(':id_ropa_tienda', $data['id_ropa_tienda'], PDO::PARAM_INT);
        $modificar->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
        return $modificar->execute();
    }

    function delete($id) {
        $this->conexion();
        $sql = "DELETE FROM carrito WHERE id_carrito = :id_carrito";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        return $borrar->execute();
    }

    function readOne($id) {
        $this->conexion();
        $consulta = "SELECT * FROM carrito WHERE id_carrito = :id_carrito";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }    

    function readAll() {
        $this->conexion();
        $consulta = "SELECT * FROM carrito";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
