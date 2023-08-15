<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $genero = (new Genero)->get_x_id($id);
    $genero->delete();
    
    (new Alerta())->add_alerta('danger', "El Genero <strong>" . $genero->getNombre() ."</strong> se eliminó correctamente.");
    header('Location: ../index.php?sec=admin_generos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar el Genero <strong>" . $genero->getNombre() ."</strong>, por favor pongase en contacto con el administrador de sistema.");
    header('Location: ../index.php?sec=admin_generos');
}
