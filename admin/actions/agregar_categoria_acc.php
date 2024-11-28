<?PHP 
require_once "../../funciones/autoload.php";

$postData = $_POST;

try {

    Categoria::insert(
        $postData['nombre'],
        $postData['nombre_url'],
    );
    Alerta::anadir_alerta('success', "La categoria fue creada correctamente");
} catch (Exception $e) {
   
    Alerta::anadir_alerta('danger', "La categoria no se pudo crear");

}

header('Location: ../index.php?seccion=admin_categorias');
?>