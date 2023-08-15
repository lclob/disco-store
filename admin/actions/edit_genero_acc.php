<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$id = $_GET['id'] ?? FALSE;

try {
    $genero = (new Genero)->get_x_id($id);

    $genero->edit($postData['nombre']);

    (new Alerta())->add_alerta('warning', "El Genero <strong>{$postData['nombre']}</strong> se editó correctamente");
    header('Location: ../index.php?sec=admin_generos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado: <strong>" . $e->getMessage() ."</strong>");
    header('Location: ../index.php?sec=admin_generos');
}
