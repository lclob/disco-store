<?PHP
require_once "../../functions/autoload.php";

$id = $_GET['id'] ?? FALSE;


try {
    $disco = (new Disco())->producto_x_id($id);
    (new disco())->clear_artista();

    $disco->delete();
    
    (new Alerta())->add_alerta('danger', "El disco <strong>" . $disco->getTitulo() ."</strong> se eliminó correctamente");
    header('Location: ../index.php?sec=admin_discos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "No se pudo eliminar el disco: <strong>" . $disco->getTitulo() ."</strong>, por favor pongase en contacto con el administrador de sistema.");
    header('Location: ../index.php?sec=admin_discos');
}
