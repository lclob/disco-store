<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'];

try {    
    $portada = (new Imagen())->subirImagen(__DIR__ . "/../../imagenes_artistas", $fileData);
    
    (new Artista())->insert(
        $postData['nombre'], 
        $postData['alias'], 
        $postData['biografia'], 
        intval($postData['primera_aparicion']), 
        $portada
    );
    (new Alerta())->add_alerta('success', "El Artista <strong>{$postData['nombre']} ({$postData['alias']})</strong> se cargó correctamente");
    header('Location: ../index.php?sec=admin_artistas');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado: <strong>" . $e->getMessage() ."</strong>");
    header('Location: ../index.php?sec=admin_artistas');
}