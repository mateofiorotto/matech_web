<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $categoria = Categoria::categoria_por_id($id);
    $categoria->delete();
    Alerta::anadir_alerta('success', "La categoria fue eliminada correctamente");
} catch (Exception $e) {

    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "La categoria no se puede eliminar porque esta en una relación con otra entidad");
    }else{
        Alerta::anadir_alerta('danger', "La categoria no se puede eliminar, pongase en contacto con servicio técnico");
    }
}
header('Location: ../index.php?seccion=admin_categorias');