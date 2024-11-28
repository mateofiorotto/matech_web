<?PHP
require_once "../../funciones/autoload.php";

$postData = $_POST;

$login = Autenticacion::log_in($postData['usuario'], $postData['contrasena']);

if ($login) {

    if($login == "usuario"){ 
        header('location: ../../index.php');
    }else{
        header('location: ../index.php?seccion=dashboard');
    }
    
} else {
    header('location: ../../index.php?seccion=login');
}

