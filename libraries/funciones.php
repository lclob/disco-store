<?PHP

/**
 * Esta función devuelve las primeras x palabras de un párrafo.
 * @param string $texto Este es el párrafo a reducir.
 * @param int $cantidad Esta es la cantidad de palabras a extraer (Opcional)
 * 
 * @return string La cantidad de palabras solicitada con un elipsis(...) concatenado al final.
 */
function recortar_palabras(string $texto, int $cantidad = 10):string{    
    $array = explode(" ", $texto);
    if (count($array)<=$cantidad) {
        $resultado = $texto;
    } else  {
        array_splice($array, $cantidad);
        $resultado = implode(" ", $array)."...";
    }
    return $resultado;
}