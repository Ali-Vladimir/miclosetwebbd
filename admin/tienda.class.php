<?php
require_once ('../sistema.class.php');

class tienda extends sistema {
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO tienda(tienda, direccion, telefono) 
                VALUES(:tienda, :direccion, :telefono);";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':tienda', $data['tienda'], PDO::PARAM_STR);
        $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE tienda SET tienda = :tienda, direccion = :direccion, telefono = :telefono WHERE id_tienda = :id_tienda";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_tienda', $id, PDO::PARAM_INT);
        $modificar->bindParam(':tienda', $data['tienda'], PDO::PARAM_STR);
        $modificar->bindParam(':direccion', $data['direccion'], PDO::PARAM_STR);
        $modificar->bindParam(':telefono', $data['telefono'], PDO::PARAM_STR);
        return $modificar->execute();
    }    

    function delete($id) {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM tienda WHERE id_tienda = :id_tienda";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_tienda', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }

    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM tienda WHERE id_tienda = :id_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_tienda', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }    

    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM tienda";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
