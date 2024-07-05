<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Factura</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: url('../vistas/img/imagen6.jpg');
            background-size: cover;
            background-position: center;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center ">
        <div class="card p-4">
            <h2 class="text-center mb-4">Modificar Factura</h2>

            <?php
            // Verificar si se ha enviado un formulario de actualización
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'actualizarFactura') {
                // Recibir y procesar los datos del formulario
                $id_factura = $_POST['id_factura'];
                $id_cliente = $_POST['id_cliente'];
                $fecha = $_POST['fecha'];
                $total = $_POST['total'];
                $impuestos = $_POST['impuestos'];
                $descuentos = $_POST['descuentos'];
                $total_final = $_POST['total_final'];
                $estado = $_POST['estado'];

                // Mostrar mensaje de éxito
                echo '<div class="alert alert-success" role="alert">Los datos de la factura han sido actualizados correctamente.</div>';
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_factura'])) {
                $id_factura = $_GET['id_factura'];

                

                // Incluir el archivo de configuración y el modelo 
                require_once __DIR__ . '../../../config.php';
                require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';

                // Ejecutar la acción para buscar factura por ID
                $factura = consultar_factura_por_id($id_factura);

                if ($factura) {
                    // Rellenar los campos del formulario con los datos de la factura
                    $id_factura = $factura['id_factura'];
                    $id_cliente = $factura['id_cliente'];
                    $fecha = $factura['fecha'];
                    $total = $factura['total'];
                    $impuestos = $factura['impuestos'];
                    $descuentos = $factura['descuentos'];
                    $total_final = $factura['total_final'];
                    $estado = $factura['estado'];
            ?>
                    <form method="POST" action="../controlador/controlador_facturacion.php">

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="id_factura">ID Factura:</label>
                                <input type="text" class="form-control" name="id_factura" value="<?php echo $id_factura; ?>" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="actualizarFactura">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_cliente">ID Cliente:</label>
                                <input type="text" class="form-control" id="id_cliente" name="id_cliente" value="<?php echo $id_cliente; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="total">Total:</label>
                                <input type="text" class="form-control" id="total" name="total" value="<?php echo $total; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="impuestos">Impuestos:</label>
                                <input type="text" class="form-control" id="impuestos" name="impuestos" value="<?php echo $impuestos; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="descuentos">Descuentos:</label>
                                <input type="text" class="form-control" id="descuentos" name="descuentos" value="<?php echo $descuentos; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="total_final">Total Final:</label>
                                <input type="text" class="form-control" id="total_final" name="total_final" value="<?php echo $total_final; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <select id="estado" name="estado" class="form-control" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="pagado">Pagado</option>
                                <option value="cancelado">Cancelado</option>
                            </select>
                        </div><br>
                        <div class="text-center">
                        <button type="submit" class="btn btn-success btn-sm">Actualizar Factura</button>
                        </div>
                    </form>
            <?php
                } else {
                    // Manejar el caso donde no se encontró la factura
                    echo '<div class="alert alert-danger" role="alert">No se encontró ninguna factura con el ID proporcionado.</div>';
                }
            } else {
                // Mostrar un mensaje si no se proporcionó el ID de la factura
                echo '<div class="alert alert-warning" role="alert">Por favor, ingresa un ID de la factura válido.</div>';
            }
            ?>

            <div class="text-center mt-3">
                <a href="../vista/editar_factura_vista.php" class="btn btn-primary btn-sm">
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
    </div>
</body>

</html>