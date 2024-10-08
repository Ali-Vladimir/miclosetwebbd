<?php
require_once ('../sistema.class.php');

class ropa_tienda extends sistema {
    // Crear una nueva prenda
    function create($data) {
        $result = [];
        $this->conexion();
        $sql = "INSERT INTO ropa_tienda(nombre_prenda, categoria, color, talla, precio, stock) 
                VALUES(:nombre_prenda, :categoria, :color, :talla, :precio, :stock)";
        $crear = $this->con->prepare($sql);
        $crear->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $crear->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $crear->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $crear->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $crear->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $crear->bindParam(':stock', $data['stock'], PDO::PARAM_INT);

        $crear->execute();
        $result = $crear->rowCount();
        return $result;
    }    

    // Actualizar una prenda existente
    public function update($id, $data) {
        $this->conexion();
        $sql = "UPDATE ropa_tienda SET nombre_prenda = :nombre_prenda, categoria = :categoria, color = :color, talla = :talla, 
                precio = :precio, stock = :stock WHERE id_ropa_tienda = :id_ropa_tienda";
        $actualizar = $this->con->prepare($sql);
        $actualizar->bindParam(':nombre_prenda', $data['nombre_prenda'], PDO::PARAM_STR);
        $actualizar->bindParam(':categoria', $data['categoria'], PDO::PARAM_STR);
        $actualizar->bindParam(':color', $data['color'], PDO::PARAM_STR);
        $actualizar->bindParam(':talla', $data['talla'], PDO::PARAM_STR);
        $actualizar->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $actualizar->bindParam(':stock', $data['stock'], PDO::PARAM_INT);
        $actualizar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        
        return $actualizar->execute();
    }    

    // Eliminar una prenda
    function delete($id) {
        $result = [];
        $this->conexion();
        if(is_numeric($id)){
            $sql = "DELETE FROM ropa_tienda WHERE id_ropa_tienda = :id_ropa_tienda";
            $borrar = $this->con->prepare($sql);
            $borrar->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
            $borrar->execute();
            $result = $borrar->rowCount();
        }
        return $result;
    }

    // Leer una sola prenda por ID
    function readOne($id) {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM ropa_tienda WHERE id_ropa_tienda = :id_ropa_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->bindParam(':id_ropa_tienda', $id, PDO::PARAM_INT);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    }    

    // Leer todas las prendas
    function readAll() {
        $this->conexion();
        $result = [];
        $consulta = "SELECT * FROM ropa_tienda";
        $sql = $this->con->prepare($consulta);
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
?>
