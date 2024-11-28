<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $etiqueta = Etiqueta::etiqueta_por_id($id);
    $etiqueta->delete();
    Alerta::anadir_alerta('success', "La etiqueta fue eliminada correctamente");
} catch (Exception $e) {

    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "La etiqueta no se puede eliminar porque esta en una relación con otra entidad");
    }else{
        Alerta::anadir_alerta('danger', "La etiqueta no se puede eliminar, pongase en contacto con servicio técnico");
    }
}
header('Location: ../index.php?seccion=admin_etiquetas');