<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    //obtengo la marca y lo mando al delete
    //borro la img tambien del directorio
    $marca = Marca::marca_por_id($id);
    $marca->delete();
    Imagen::borrarImagen( "../../elementos-graficos/marcas/" . $marca->getImagen());
    Alerta::anadir_alerta('success', "La marca fue eliminada correctamente");
} catch (Exception $e) {

    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "La marca no se puede eliminar porque esta en una relación con otra entidad");
    }else{
        Alerta::anadir_alerta('danger', "La marca no se puede eliminar, pongase en contacto con servicio técnico");
    }
}

//redireccion
header('Location: ../index.php?seccion=admin_marcas');