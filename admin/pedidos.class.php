<?php
require_once('../sistema.class.php');

class Pedido extends sistema {
    function create($data) {
        $this->conexion();
        $sql = "INSERT INTO pedidos (id_usuario, fecha_pedido, estado_pedido, direccion_envio) 
                VALUES (:id_usuario, :fecha_pedido, :estado_pedido, :direccion_envio);";
        $crear = $this->con->prepare($sql);
        $crear->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $crear->bindParam(':fecha_pedido', $data['fecha_pedido'], PDO::PARAM_STR);
        $crear->bindParam(':estado_pedido', $data['estado_pedido'], PDO::PARAM_STR);
        $crear->bindParam(':direccion_envio', $data['direccion_envio'], PDO::PARAM_STR);
        $crear->execute();
        return $crear->rowCount();
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE pedidos SET id_usuario = :id_usuario, fecha_pedido = :fecha_pedido, estado_pedido = :estado_pedido, direccion_envio = :direccion_envio 
                WHERE id_pedido = :id_pedido;";
        $actualizar = $this->con->prepare($sql);
        $actualizar->bindParam(':id_pedido', $id, PDO::PARAM_INT);
        $actualizar->bindParam(':id_usuario', $data['id_usuario'], PDO::PARAM_INT);
        $actualizar->bindParam(':fecha_pedido', $data['fecha_pedido'], PDO::PARAM_STR);
        $actualizar->bindParam(':estado_pedido', $data['estado_pedido'], PDO::PARAM_STR);
        $actualizar->bindParam(':direccion_envio', $data['direccion_envio'], PDO::PARAM_STR);
        return $actualizar->execute();
    }

    function delete($id) {
        $this->conexion();
        $sql = "DELETE FROM pedidos WHERE id_pedido = :id_pedido;";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_pedido', $id, PDO::PARAM_INT);
        $borrar->execute();
        return $borrar->rowCount();
    }

    function readOne($id) {
        $this->conexion();
        $sql = "SELECT * FROM pedidos WHERE id_pedido = :id_pedido;";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(':id_pedido', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    function readAll() {
        $this->conexion();
        $sql = "SELECT * FROM pedidos;";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
