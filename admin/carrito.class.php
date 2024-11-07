<?php
require_once ('../sistema.class.php');

class carrito extends sistema {
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO carrito (id_usuario, fecha_creacion) 
                VALUES (:id_usuario, :fecha_creacion);";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        // Insertar la fecha actual para la fecha de creación
        $fechaActual = date('Y-m-d');
        $modificar->bindParam(':fecha_creacion', $fechaActual);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }
    

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE carrito SET id_usuario = :id_usuario WHERE id_carrito = :id_carrito";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        $modificar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        return $modificar->execute();
    }
    

    function delete($id) {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM carrito WHERE id_carrito = :id_carrito";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }

    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM carrito WHERE id_carrito = :id_carrito";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_carrito', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }    

    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM carrito";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
