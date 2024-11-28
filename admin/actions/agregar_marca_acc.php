<?PHP 
require_once "../../funciones/autoload.php";

//datos del post e img
$postData = $_POST;
$fileData = $_FILES['imagen'] ?? FALSE; 

try {
    //subo la img al directorio
    $imagen = Imagen::subirImagen("../../elementos-graficos/marcas/", $fileData);

    //inserto los datos
    Marca::insert(
        $postData['nombre'],
        $postData['nombre_url'],
        $postData['descripcion'],
        $postData['fundacion'],
        $postData['origen'],
        $imagen,
    );
    Alerta::anadir_alerta('success', "La marca fue creada correctamente");
} catch (Exception $e) {
   
    Alerta::anadir_alerta('danger', "La marca no se pudo crear");

}

//redirec. a admin
header('Location: ../index.php?seccion=admin_marcas');
?>