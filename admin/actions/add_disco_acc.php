<?PHP
require_once "../../functions/autoload.php";

$postData = $_POST;
$fileData = $_FILES['portada'];

try {
  $disco = new Disco();

  $portada = (new Imagen())->subirImagen(__DIR__ . "/../../imagenes_discos", $fileData);

  $idDisco = $disco->insert(
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


  $disco->add_artista(intval($idDisco), $postData['artista']);


  (new Alerta())->add_alerta('success', "El Disco <strong>{$postData['titulo']}</strong> se cargó correctamente");
  header('Location: ../index.php?sec=admin_discos');
} catch (Exception $e) {
  (new Alerta())->add_alerta('danger', "Ocurrió un error inesperado: <strong>" . $e->getMessage() ."</strong>");
  header('Location: ../index.php?sec=admin_artistas');
}
