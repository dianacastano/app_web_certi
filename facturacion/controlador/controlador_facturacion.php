<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

</body>

</html>


<?php
// Incluir el archivo de configuración
require_once __DIR__ . '../../../config.php';

// Incluir el modelo de contactos
require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';

$method = $_SERVER['REQUEST_METHOD'];

$file = fopen('method.txt', 'w');
fwrite($file, $method . PHP_EOL);



$action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];

fwrite($file, 'Valor de $action: ' . $action . PHP_EOL);


switch ($method) {
    case 'POST':
        switch ($action) {
            case 'agregarFactura':
                agregar_factura(
                    $_POST['id_cliente'],
                    $_POST['fecha'],
                    $_POST['total'],
                    $_POST['impuestos'],
                    $_POST['descuentos'],
                    $_POST['total_final'],
                    $_POST['estado']
                );

                echo "<html><div class='card mx-auto position-absolute top-50 start-50 translate-middle p-5' style='align-items: center;background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);'><p class='lead'><strong>Factura agregada exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/agregar_factura_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";
                break;

            case 'eliminarFactura':
                eliminar_factura(
                    $_POST['id_factura'],
                    0
                );

                echo "<html><div class='card mx-auto position-absolute top-50 start-50 translate-middle p-5' style='align-items: center;background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);'><p class='lead'><strong>Factura eliminada exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/eliminar_factura_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;

            case 'actualizarFactura':
                actualizar_factura(
                    $_POST['id_factura'],
                    $_POST['id_cliente'],
                    $_POST['fecha'],
                    $_POST['total'],
                    $_POST['impuestos'],
                    $_POST['descuentos'],
                    $_POST['total_final'],
                    $_POST['estado']
                );

                echo "<html><div class='card mx-auto' style='align-items: center;'><p class='lead'><strong>Factura actualizada exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/editar_factura_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;
            case 'agregarDetalle':
                agregar_detalle(
                    $_POST['id_factura'],
                    $_POST['id_producto'],
                    $_POST['cantidad'],
                    $_POST['precio_unitario'],
                    $_POST['total']
                );

                echo "<html><div class='card mx-auto position-absolute top-50 start-50 translate-middle p-5' style='align-items: center;background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);'><p class='lead'><strong>Detalle agregado exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/agregar_detalle_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;

            case 'actualizarDetalle':
                actualizar_detalle(                    
                    $_POST['id_detalle'],
                    $_POST['id_factura'],
                    $_POST['id_producto'],
                    $_POST['cantidad'],
                    $_POST['precio_unitario'],
                    $_POST['total']
                );

                echo "<html><div class='card mx-auto' style='align-items: center;'><p class='lead'><strong>Factura actualizada exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/editar_detalle_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;
            case 'eliminarDetalle':
                eliminar_detalle(
                    $_POST['id_detalle'],
                    0
                );
                echo "<html><div class='card mx-auto' style='align-items: center;'><p class='lead'><strong>Detalle eliminado exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/eliminar_detalle_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";
                break;
            default:
                echo "Acción no esperada.";
                break;



            case 'agregarPago':
                agregar_pago(
                    $_POST['id_factura'],
                    $_POST['fecha_pago'],
                    $_POST['importe'],
                    $_POST['metodo_pago']
                );

                echo "<html><div class='card mx-auto' style='align-items: center;'><p class='lead'><strong>Pago agregado exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/agregar_pago_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;

            case 'eliminarPago':
                eliminar_pago(
                    $_POST['id_pago'],
                    0
                );
                echo "<html><div class='card mx-auto position-absolute top-50 start-50 translate-middle p-5' style='align-items: center;background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);'><p class='lead'><strong>Pago eliminado exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/eliminar_pago_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;

            case 'actualizarPago':
                actualizar_pago(
                    $_POST['id_pago'],
                    $_POST['id_factura'],
                    $_POST['fecha_pago'],
                    $_POST['importe'],
                    $_POST['metodo_pago']
                );

                echo "<html><div class='card mx-auto' style='align-items: center;'><p class='lead'><strong>Pago actualizado exitosamente.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/form_pagos_vista.php?id_pago=" . $_POST['id_pago'] . "' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                break;
        }
        break;
    case 'GET':
        switch ($action) {
            case 'listarFacturas':
                $facturas = listar_facturas();
                foreach ($facturas as $factura) {
                    echo "ID: {$factura['id_factura']}, Cliente: {$factura['nombre']}, Fecha: {$factura['fecha']}, Total: {$factura['total']}, Estado: {$factura['estado']}<br>";
                }
                break;
            case 'consultarFacturaPorId':

                $factura = consultar_factura_por_id($_GET['id_factura']);
                if ($factura) {
                    echo "ID: {$factura['id_factura']}, Cliente: {$factura['id_cliente']}, Fecha: {$factura['fecha']}, Total: {$factura['total']}, Estado: {$factura['estado']}<br>";
                } else {
                    
                    echo "<html><div class='card mx-auto position-absolute top-50 start-50 translate-middle p-5' style='align-items: center;background-color: rgba(000, 000, 000, 0.3)'><p class='lead'><strong>Factura no encontrada.</strong></p><div class='row' style='margin: 30px; text-align: center;'><a href='../vista/consultar_factura_vista.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d='M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A15 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d='M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg>Volver </a></div><div class='row'> <a href='../index_facturacion.php' class='btn btn-primary btn-sm'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-box-arrow-in-left' viewBox='0 0 16 16'><path fill-rule='evenodd' d=' M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z' /><path fill-rule='evenodd' d=' M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z' /></svg> Inicio </a></div></html>";

                }
                break;
            case 'listarDetalles':
                $detalles = listar_detalles($id_detalle);
                foreach ($detalles as $detalle) {
                    echo "ID Detalle: {$detalle['id_detalle']}, Producto: {$detalle['id_producto']}, Cantidad: {$detalle['cantidad']}, Precio Unitario: {$detalle['precio_unitario']}, Total: {$detalle['total']}<br>";
                }
                break;
            case 'consultarDetallePorId':

                $detalle = consultar_detalle_por_id($_GET['id_detalle']);
                if ($detalle) {
                    echo "ID: {$detalle['id_detalle']}, Producto: {$detalle['id_ptoducto']}, Cantidad: {$detalle['cantidad']}, Precio Unitario: {$detalle['precio_unitario']}, Total: {$detalle['total']}<br>";
                } else {
                    echo "Factura no encontrada.";
                }
                break;

            case 'listarPagos':
                $pagos = listar_pagos($id_pago);
                foreach ($pagos as $pago) {
                    echo "ID Pago: {$pago['id_pago']}, Factura: {$pago['id_factura']}, Importe: {$pago['importe']}, Fecha Pago: {$pago['fecha_pago']}, Metodo Pago: {$pago['metodo_pago']}<br>";
                }
                break;
            case 'consultarPagoPorId':
                $pago = consultar_pago_por_id($_GET['id_pago']);
                if ($pago) {
                    echo "ID: {$pago['id_pago']}, Factura: {$pago['id_factura']}, Fecha Pago: {$pago['fecha_pago']}, Importe: {$pago['importe']}, Metodo Pago: {$pago['metodo_pago']}<br>";
                } else {
                    echo "Pago no encontrada.";
                }
                break;

            default:
                echo "Acción no esperada.";
                break;
        }
}


fclose($file);
?>