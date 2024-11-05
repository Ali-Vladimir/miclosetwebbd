<?php
require_once ('../sistema.class.php');

class Usuario extends sistema {
    function create($data) {
        try {
            $this->conexion();
            $sql = "INSERT INTO usuarios (nombre, email, contrasena, direccion, telefono) 
                    VALUES (:nombre, :email, :contrasena, :direccion, :telefono);";
            $modificar = $this->con->prepare($sql);
            $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $modificar->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $modificar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
            $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
            $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
            $modificar->execute();
            $result = $modificar->rowCount();
            return $result;
        } catch (PDOException $e) {
            echo "Error en la creación: " . $e->getMessage();
        }
    }
    public function update($id, $data) {
        try {
            $this->conexion();
            $sql = "UPDATE usuarios SET nombre = :nombre, email = :email, contrasena = :contrasena, direccion = :direccion, telefono = :telefono WHERE id_usuario = :id_usuario";
            $modificar = $this->con->prepare($sql);
            $modificar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $modificar->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $modificar->bindParam(':email', $data['email'], PDO::PARAM_STR);
            $modificar->bindParam(':contrasena', $data['contrasena'], PDO::PARAM_STR);
            $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
            $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
            return $modificar->execute();
        } catch (PDOException $e) {
            echo "Error en la actualización: " . $e->getMessage();
        }
    }  
    function delete($id) {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }

    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }    

    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM usuarios";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
