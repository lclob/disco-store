<?PHP
require_once "../../functions/autoload.php";

$items = (new Carrito())->get_carrito();
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;

try {

    if ($userID) {

        $datosCompra = [
            "id_usuario" => $userID,
            "fecha" => date("Y-m-d", time()),
            "importe" => (new Carrito())->precio_total()
        ];

        $detalleCompra = [];

        foreach ($items as $key => $value) {
            $detalleCompra[$key] = $value['cantidad'];
        }

        echo "<pre>";
        print_r($datosCompra);
        echo "</pre>";
        echo "<pre>";
        print_r($detalleCompra);
        echo "</pre>";

        (new Carrito())->insert_checkout_data($datosCompra, $detalleCompra);
        (new Carrito())->clear_items();

        (new Alerta())->add_alerta('success', "Los datos de la compra se guardaron correctamente.");
        header('location: ../../index.php?sec=discos');
    } else {
        (new Alerta())->add_alerta('warning', "Su sessión expiró. Por favor, ingrese nuevamente");
        header('location: ..index.php?sec=login');
    }
} catch (Exception $e) {
    echo "<pre>";
    print_r($e);
    echo "</pre>";
    (new Alerta())->add_alerta('warning', "No se pudo finalizar la compra");
}
