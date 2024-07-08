<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-body-secondary lead">
    
<div class="card p-5 position-absolute top-50 start-50 translate-middle" style="background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);">
            <h2 class="text-center mb-4 lead" style="font-size: xx-large;"><strong>Eliminar Factura</strong></h2>

            <?php
            // Verificar si se ha enviado un formulario de eliminación
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_factura'])) {
                // Obtener el ID del factura a eliminar
                $id_factura = $_POST['id_factura'];

                // Incluir el archivo de configuración y el modelo de contactos
                require_once __DIR__ . '../../../config.php';
                require_once FACTURAS_MODEL_PATH . 'modelo_facturacion.php';

                // Mostrar mensaje de éxito
                echo '<div class="alert alert-success" role="alert">La factura ha sido eliminada correctamente.</div>';
            }
            ?>

            <form method="POST" action="../controlador/controlador_facturacion.php">
                <input type="hidden" name="action" value="eliminarFactura">
                <div class="form-group">
                    <label for="id_factura"><strong class="lead">ID Factura a Eliminar:</strong></label>
                    <input type="text" class="form-control" id="id_factura" name="id_factura" required>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        Eliminar </button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="../index_facturacion.php" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    Inicio
                </a>
            </div>
        </div>
    
</body>

</html>