<?PHP
require_once "../../funciones/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {

    $usuario = Usuario::usuario_por_id($id);
    $usuario->delete();
    Alerta::anadir_alerta('success', "El usuario fue eliminado correctamente");
} catch (Exception $e) {

    if($e->getCode()  == 23000){
        Alerta::anadir_alerta('danger', "El usuario no se puede eliminar porque esta en una relación con otra entidad");
    }else{
        Alerta::anadir_alerta('danger', "El usuario no se puede eliminar, pongase en contacto con servicio técnico");
    }
}

header('Location: ../index.php?seccion=admin_usuarios');