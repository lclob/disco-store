<?PHP

class Imagen
{
  private $error;

  public function subirImagen($directorio, $datosArchivo): string
  {
    if (!empty($datosArchivo['tmp_name'])) {
      $og_name = (explode(".", $datosArchivo['name']));
      $extension = end($og_name);
      $filename = time() . ".$extension";
  
      $fileUpload = move_uploaded_file($datosArchivo['tmp_name'], "$directorio/$filename");
  
      if (!$fileUpload) {
        throw new Exception("No se pudo subir la imagen");
      } else {
        return $filename;
      }
    }
  
    return '';
  }
  

  public function borrarImagen($archivo): bool
  {
    if (file_exists(($archivo))) {

      $fileDelete =  unlink($archivo);

      if (!$fileDelete) {
        throw new Exception("No se pudo subir la imagen");
      } else {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  }

  /**
   * Get the value of error
   */
  public function getError()
  {
    return $this->error;
  }
}
