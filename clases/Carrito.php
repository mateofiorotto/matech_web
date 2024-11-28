<?php 

class Carrito
{

    /**
     * Devuelve el contenido del carrito actual
     */
    public static function get_carrito(): array {
        //retorno el carrito de la sesion
        if (!empty($_SESSION['carrito'])) {
            return $_SESSION['carrito'];
        } else {
            return [];
        }
    }

    /**
     * Agrega un item al carrito de compras
     * @param int $productoID el id del producto a agregar
     * @param int $cantidad la cantidad de unidades a agregar
     */
    public static function agregar_item(int $componenteID, int $cantidad){
        $itemData = Componente::producto_por_id($componenteID);

        if ($itemData) {
            $_SESSION['carrito'][$componenteID] = [
                'nombre' => $itemData->getNombre(),
                'precio' => $itemData->getPrecio(),
                'imagen' => $itemData->getImagen(),
                'cantidad' => $cantidad
            ];
        }
    }

    /**
     * Elimina un item del carrito
     * @param int $componenteID el id del prod a eliminar
     */
    public static function eliminar_item(int $componenteID){
        if (isset($_SESSION['carrito'][$componenteID])) {
            unset($_SESSION['carrito'][$componenteID]);
        }
    }

     /**
     * Elimina todo los items del carrito
     */
    public static function vaciar_carrito(){
        $_SESSION['carrito'] = [];
    }

     /**
     * Actualiza las cantidades de los productos existentes en el carrito
     */
    public static function actualizar_cantidades(array $cantidades){
        foreach ($cantidades as $key => $value){
            if (isset($_SESSION['carrito'][$key])) {
                $_SESSION['carrito'][$key]['cantidad'] = $value;

                //si la cantidad es 0 entonces borra el item del carrito
                if ( $value <= 0) {
                    self::eliminar_item($key);
                }
            }
        }
    }

    /**
     * Obtener precio total actual del carrito
     */

     public static function precio_total(): float
     {
        $total = 0;
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
     }
    
}

?>