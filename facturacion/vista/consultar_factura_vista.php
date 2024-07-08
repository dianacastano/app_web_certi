<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Factura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="card p-5 position-absolute top-50 start-50 translate-middle" style="background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);">
    <h2 class="text-center lead" style="border-radius:5px; font-size:xx-large"><strong> Consultar Factura </strong></h2>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_factura'])) {

            $id_contacto = $_POST['id_factura'];

            // Incluir el archivo de configuración y el modelo de contactos
            require_once __DIR__ . '../../../config.php';
            require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';



            // Mostrar mensaje de éxito
            echo '<div class="alert alert-success" role="alert">El contacto ha sido eliminado correctamente.</div>';
        }
        ?>

        <form method="GET" action="../controlador/controlador_facturacion.php" class="text-center">
            <input type="hidden" name="action" value="consultarFacturaPorId">
            <label for="id_factura" class="text-center font-weight-bold">ID de factura:</label><br>
            <input type="text" id="id_factura" name="id_factura"><br><br>
            <button type="submit" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                    <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018" />
                    <path d="M13 6.5a6.47 6.47 0 0 1-1.258 3.844q.06.044.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11" />
                </svg>
                Buscar</button>
        </form>
        <div class="text-center mt-3">
            <a href="../index_facturacion.php" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
                Inicio
            </a>
        </div>
    </div>
</body>

</html>