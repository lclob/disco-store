<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;

try {    

    (new Genero())->insert($postData['nombre']);
    (new Alerta())->add_alerta('success', "El Genero <strong>{$postData['nombre']} ({$postData['alias']})</strong> se cargó correctamente");

    header('Location: ../index.php?sec=admin_generos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado: <strong>" . $e->getMessage() ."</strong>");
    header('Location: ../index.php?sec=admin_generos');
}