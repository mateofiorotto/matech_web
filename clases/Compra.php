<?php 

class Compra {

    /**
     * Devuelve el historial de compras de un usuario
     * 
     * @return Compra[] Un array de objetos Compra
     */
    public static function historial_compras(int $idUsuario): array
{
    $conexion = Conexion::getConexion();
    $query = "SELECT compras.id, compras.fecha, compras.importe, GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x ', componentes.nombre) SEPARATOR ', ') detalle
              FROM compras 
              JOIN item_x_compra ON compras.id = item_x_compra.compra_id
              JOIN componentes ON item_x_compra.item_id = componentes.id 
              WHERE compras.usuario_id = ? 
              GROUP BY (compras.id);";

    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute([$idUsuario]);

    $result = $PDOStatement->fetchAll();

    return $result ?? [];
}
}

?>