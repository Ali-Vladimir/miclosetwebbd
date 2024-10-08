<?php
require_once ('../sistema.class.php');

class Tienda extends sistema {
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO Ropa_Tienda(nombre_prenda, categoria, color, talla, precio, stock, imagen_url) 
                VALUES(:nombre_prenda, :categoria, :color, :talla, :precio, :stock, :imagen_url);";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $modificar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        $modificar->execute();
        $result = $modificar->rowCount();
        return $result;
    }

    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE Ropa_Tienda SET nombre_prenda = :nombre_prenda, categoria = :categoria, color = :color, talla = :talla, 
                precio = :precio, stock = :stock, imagen_url = :imagen_url WHERE id_ropa_tienda = :id_ropa_tienda";
        $modificar = $this->con->prepare($sql);
        $modificar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $modificar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $modificar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $modificar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $modificar->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $modificar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $modificar->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        $modificar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        return $modificar->execute();
    }    

    function delete($id) {
        $result = [];
        $this->conexion();
        $sql = "DELETE FROM Ropa_Tienda WHERE id_ropa_tienda = :id_ropa_tienda";
        $borrar = $this->con->prepare($sql);
        $borrar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        $borrar->execute();
        $result = $borrar->rowCount();
        return $result;
    }

    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM Ropa_Tienda WHERE id_ropa_tienda = :id_ropa_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }    

    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM Ropa_Tienda";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
