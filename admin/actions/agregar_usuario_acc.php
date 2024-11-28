<?PHP 
require_once "../../funciones/autoload.php";

$postData = $_POST;

try {

    Usuario::insert(
        $postData['email'],
        $postData['nombre_completo'],
        $postData['nombre_usuario'],
        $postData['contrasena'],
        (int)$postData['telefono'],
        $postData['direccion'],
        $postData['rol'],
    );
    Alerta::anadir_alerta('success', "El usuario fue creado correctamente");
} catch (Exception $e) {
   
    Alerta::anadir_alerta('danger', "El usuario no se pudo crear");

}

header('Location: ../index.php?seccion=admin_usuarios');
?>