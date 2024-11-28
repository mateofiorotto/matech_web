<?php 

class Checkout
{
    /**
     * Inserta una compra en la base de datos.
     * Guarda los datos generales de la compra en la tabla `compras` 
     * y los detalles de los productos comprados en la tabla `item_x_compra`.
     *
     * @param array $datosCompra Datos generales de la compra (usuario, fecha, importe).
     * @param array $datosProducto Detalles de los productos comprados (ID del producto y cantidad).
     */
    public static function insertar_data_checkout(array $datosCompra, array $datosProducto)
    {
        $conexion = Conexion::getConexion();
         //inserta los datos de la compra en la tabla `compras`
        $query = "INSERT INTO compras VALUES (NULL, :id_usuario, :fecha, :importe)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            "id_usuario" => $datosCompra['id_usuario'],
            "fecha" => $datosCompra['fecha'],
            "importe" => $datosCompra['importe']
        ]);
    
        //id de la compra insertada
        $idInsertada = $conexion->lastInsertId();
        
        //recorre el array `$datosProducto` para insertar productos comprados
        foreach ($datosProducto as $key => $value) {
            $query = "INSERT INTO item_x_compra VALUES (NULL, :id_compra, :id_componente, :cantidad)";
            $PDOStatement = $conexion->prepare($query);
            $PDOStatement->execute([
                "id_compra" => $idInsertada,
                "id_componente" => $key,
                "cantidad" => $value
            ]);
        }
    }
    
}

?>