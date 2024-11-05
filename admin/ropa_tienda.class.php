<?php
require_once ('../sistema.class.php');

class RopaTienda extends sistema {
    function create($data) {
        $this->conexion();
        $sql = "INSERT INTO ropa_tienda(id_tienda, nombre_prenda, categoria, color, talla, precio, stock, imagen_url) 
                VALUES(:id_tienda, :nombre_prenda, :categoria, :color, :talla, :precio, :stock, :imagen_url)";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_tienda', $data['id_tienda'], PDO::PARAM_INT);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $modificar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        return $modificar->execute();
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE ropa_tienda SET id_tienda = :id_tienda, nombre_prenda = :nombre_prenda, categoria = :categoria, color = :color, talla = :talla, precio = :precio, stock = :stock, imagen_url = :imagen_url WHERE id_ropa_tienda = :id_ropa_tienda";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        $modificar->bindParam(':id_tienda', $data['id_tienda'], PDO::PARAM_INT);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $modificar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        return $modificar->execute();
    }    

    function delete($id) {
        $this->conexion();
        $sql = "DELETE FROM ropa_tienda WHERE id_ropa_tienda = :id_ropa_tienda";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        return $borrar->execute();
    }

    function readOne($id) {
        $this->conexion();
        $consulta = "SELECT * FROM ropa_tienda WHERE id_ropa_tienda = :id_ropa_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }    

    function readAll() {
        $this->conexion();
        $consulta = "SELECT * FROM ropa_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
