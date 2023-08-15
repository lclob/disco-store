<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

$login = (new Autenticacion())->log_in($postData['username'], $postData['pass']);

if($login){
    if($login == "usuario"){ 
        header('location: ../../index.php?sec=panel_usuario');
    }else{
        header('location: ../index.php?sec=dashboard');
    }

}else{
    (new Autenticacion())->log_out();
    header('location: ../../index.php?sec=login');
}
