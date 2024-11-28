<?PHP
require_once "../../funciones/autoload.php";

//obtengo la id del comp a borrar
$id = $_GET['id'] ?? FALSE;

try {
    //asigno a $componente el producto y ejecuto el metodo borrar y 
    // en la clase imagen el metodo para borrar la imagen del directorio
    $componente = Componente::producto_por_id($id);
    $componente->limpiar_etiquetas();
    $componente->delete();
    Imagen::borrarImagen( "../../elementos-graficos/productos/" . $componente->getImagen());
    Alerta::anadir_alerta('success', "El componente fue eliminado correctamente");
} catch (Exception $e) {

    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "El componente no se puede eliminar porque esta en una relación con otra entidad");
    }else{
        Alerta::anadir_alerta('danger', "El componente no se puede eliminar, pongase en contacto con servicio técnico");
    }

}
header('Location: ../index.php?seccion=admin_componentes');