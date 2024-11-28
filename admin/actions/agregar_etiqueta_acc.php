<?PHP 
require_once "../../funciones/autoload.php";

$postData = $_POST;

try {

    Etiqueta::insert(
        $postData['nombre'],
        $postData['nombre_url'],
    );
    Alerta::anadir_alerta('success', "La etiqueta fue creada correctamente");
} catch (Exception $e) {
   
    Alerta::anadir_alerta('danger', "La etiqueta no se pudo crear");

}

header('Location: ../index.php?seccion=admin_etiquetas');
?>