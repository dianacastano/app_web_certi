<?php
require_once __DIR__ . '../../../config.php';
require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';

$detalles = listar_detalles();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Detalles de Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-body-secondary lead">
    <div class="container">
    <div class="card p-5 position-absolute top-50 start-50 translate-middle" style="background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);">
        
            <h2 class="text-center lead" style="font-size: xx-large;"><strong>Listado de Detalles de Factura</strong></h2>
            <table class="bg-dark-subtle table table-striped">
                <thead>
                    <tr style="background-color: lightgrey;">
                        <th class="lead"><strong>ID Detalle</strong></th>
                        <th class="lead"><strong>ID Factura</strong></th>
                        <th class="lead"><strong>ID Producto</strong></th>
                        <th class="lead"><strong>Cantidad</strong></th>
                        <th class="lead"><strong>Precio Unitario</strong></th>
                        <th class="lead"><strong>Total</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($detalles as $detalle) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($detalle['id_detalle']) . "</td>";
                        echo "<td>" . htmlspecialchars($detalle['id_factura']) . "</td>";
                        echo "<td>" . htmlspecialchars($detalle['id_producto']) . "</td>";
                        echo "<td>" . htmlspecialchars($detalle['cantidad']) . "</td>";
                        echo "<td>" . htmlspecialchars($detalle['precio_unitario']) . "</td>";
                        echo "<td>" . htmlspecialchars($detalle['total']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <br>
            <div class="text-center">
                <a href="../index_facturacion.php" class="btn btn-primary btn-sm" style="box-shadow: 0 0 10px rgba(0,0,0,0.3);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg> Inicio
                </a>
            </div><br>
        </div>
    </div>
</body>

</html>
