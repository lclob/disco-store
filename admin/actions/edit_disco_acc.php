<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;


try {
    $disco = (new Disco())->producto_x_id($id);
    (new Disco())->clear_artista();
    
    if (!empty($fileData['tmp_name'])) {
        $portada = (new Imagen())->subirImagen(__DIR__ . "/../../imagenes_discos/", $fileData);
        (new Imagen())->borrarImagen(__DIR__ . "/../../imagenes_discos/" . $postData['portada_og']);
    } else {
        $portada = $postData['portada_og'];
    }

    if (isset($postData['artista'])) {
        foreach ($postData['artista'] as $artista_id) {
          $disco->add_artista(intval($idDisco), $artista_id);
        }
      }

    $disco->edit(
        $postData['genero_id'],
        $postData['titulo'],
        $postData['canciones_cantidad'],
        $postData['publicacion'],
        $postData['origen'],
        $postData['bajada'],
        $portada,
        $postData['precio'],
        $postData['productor']
    );

    (new Alerta())->add_alerta('success', "El Disco <strong>{$postData['titulo']}</strong> se editó correctamente");
    header('Location: ../index.php?sec=admin_discos');
} catch (Exception $e) {
    (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado: <strong>" . $e->getMessage() ."</strong>");
    header('Location: ../index.php?sec=admin_discos');
}
