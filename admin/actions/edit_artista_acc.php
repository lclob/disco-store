<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'];
$id = $_GET['id'] ?? FALSE;

try {
    $artista = (new Artista)->get_x_id($id);

    if (!empty($fileData['tmp_name'])) {
        $portada = (new Imagen())->subirImagen(__DIR__ . "/../../imagenes_artistas/", $fileData);
        //(new Imagen())->borrarImagen(__DIR__ . "/../../imagenes_artistas/" . $postData['portada_og']);
    } else {
        $portada = $postData['portada_og'];
    }

    $artista->edit(
        $postData['nombre'],
        $postData['alias'],
        $postData['biografia'],
        $postData['primera_aparicion'],
        $portada
    );

    (new Alerta())->add_alerta('warning', "El Artista <strong>{$postData['nombre']}</strong> se editó correctamente");
    header('Location: ../index.php?sec=admin_artistas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('warning', "No se pudo editar el Artista <strong>{$postData['nombre']}</strong>." . $e->getMessage());
    header('Location: ../index.php?sec=admin_artistas');
}
