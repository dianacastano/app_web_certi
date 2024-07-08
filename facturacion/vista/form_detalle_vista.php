<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Factura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    
<div class="card p-5 position-absolute top-50 start-50 translate-middle" style="background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);">
            <h2 class="text-center mb-4">Modificar Detalle</h2>

            <?php
            // Verificar si se ha enviado un formulario de actualización
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'actualizarDetalle') {
                // Recibir y procesar los datos del formulario
                $id_detalle = $_POST['id_detalle'];
                $id_detalle = $_POST['id_factura'];
                $id_producto = $_POST['id_producto'];
                $cantidad = $_POST['cantidad'];
                $precio_unitario = $_POST['precio_unitario'];
                $total = $_POST['total'];

                // Mostrar mensaje de éxito
                echo '<div class="alert alert-success" role="alert">Los datos de la factura han sido actualizados correctamente.</div>';
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_detalle'])) {
                $id_detalle = $_GET['id_detalle'];

                

                // Incluir el archivo de configuración y el modelo 
                require_once __DIR__ . '../../../config.php';
                require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';

                // Ejecutar la acción para buscar factura por ID
                $detalle = consultar_detalle_por_id($id_detalle);

                if ($detalle) {
                    // Rellenar los campos del formulario con los datos de la factura
                    $id_detalle = $detalle['id_detalle'];
                    $id_factura = $detalle['id_factura'];
                    $id_producto = $detalle['id_producto'];
                    $cantidad = $detalle['cantidad'];
                    $precio_unitario = $detalle['precio_unitario'];
                    $total = $detalle['total'];
            ?>
                    <form method="POST" action="../controlador/controlador_facturacion.php">

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="id_detalle">ID Detalle:</label>
                                <input type="text" class="form-control" name="id_detalle" value="<?php echo $id_detalle; ?>" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="actualizarDetalle">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_factura">ID Factura:</label>
                                <input type="text" class="form-control" id="id_factura" name="id_factura" value="<?php echo $id_factura; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="id_producto">ID Producto:</label>
                                <input type="text" class="form-control" id="id_producto" name="id_producto" value="<?php echo $id_producto; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="cantidad">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="precio_unitario">Precio Unitario:</label>
                                <input type="text" class="form-control" id="precio_unitario" name="precio_unitario" value="<?php echo $precio_unitario; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="total">Total:</label>
                                <input type="number" class="form-control" id="total" name="total" value="<?php echo $total; ?>"> 
                            </div>
                        </div><br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-success btn-sm">Actualizar Detalle</button>
                        </div>
                    </form>
            <?php
                } else {
                    // Manejar el caso donde no se encontró la factura
                    echo '<div class="alert alert-danger" role="alert">No se encontró ningun detalle con el ID proporcionado.</div>';
                }
            } else {
                // Mostrar un mensaje si no se proporcionó el ID de la factura
                echo '<div class="alert alert-warning" role="alert">Por favor, ingresa un ID del detalle válido.</div>';
            }
            ?>

            <div class="text-center mt-3">
                <a href="../vista/editar_detalle_vista.php" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    </svg> Volver
        </a><br><br>
                <a href="../index_facturacion.php" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-backspace">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z" />
                    </svg> Volver Inicio
        </a>
            </div>
        </div>
    
</body>

</html>