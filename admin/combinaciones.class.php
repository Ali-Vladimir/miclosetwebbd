<?php
require_once ('../sistema.class.php');

class Combinaciones extends sistema {
    public function obtenerCombinaciones() {
        $this->conexion();
        $sql = "SELECT * FROM combinaciones";
        $resultado = $this->con->query($sql);
        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerCombinacion($id_combinacion) {
        $this->conexion();
        $sql = "SELECT * FROM combinaciones WHERE id_combinacion = :id_combinacion";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_combinacion', $id_combinacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearCombinacion($data) {
        $this->conexion();
        $sql = "INSERT INTO combinaciones (id_usuario, nombre_combinacion, fecha_creacion) VALUES (:id_usuario, :nombre_combinacion, :fecha_creacion)";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre_combinacion', $data['nombre_combinacion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha_creacion', $data['fecha_creacion'], PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function actualizarCombinacion($id_combinacion, $data) {
        $this->conexion();
        $sql = "UPDATE combinaciones SET id_usuario = :id_usuario, nombre_combinacion = :nombre_combinacion, fecha_creacion = :fecha_creacion WHERE id_combinacion = :id_combinacion";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(':nombre_combinacion', $data['nombre_combinacion'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha_creacion', $data['fecha_creacion'], PDO::PARAM_STR);
        $stmt->bindParam(':id_combinacion', $id_combinacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function eliminarCombinacion($id_combinacion) {
        $this->conexion();
        $sql = "DELETE FROM combinaciones WHERE id_combinacion = :id_combinacion";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id_combinacion', $id_combinacion, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
?>
