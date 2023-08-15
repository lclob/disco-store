<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;

try {
    $artista = (new Artista)->get_x_id($id);
    $artista->delete();
    
    (new Alerta())->add_alerta('danger', "El Artista <strong>" . $artista->getNombre() ."</strong> se eliminó correctamente.");
    header('Location: ../index.php?sec=admin_artistas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar el Artista <strong>" . $artista->getNombre() ."</strong>, por favor pongase en contacto con el administrador de sistema.");
    header('Location: ../index.php?sec=admin_artistas');
}
