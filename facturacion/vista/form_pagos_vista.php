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
<h2 class="text-center lead" style="border-radius:5px; font-size:xx-large"><strong> Modificar Pago </strong></h2>

            <?php
            // Verificar si se ha enviado un formulario de actualización
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'actualizarPago') {
                // Recibir y procesar los datos del formulario
                $id_pago = $_POST['id_pago'];
                $id_factura = $_POST['id_factura'];
                $fecha_pago = $_POST['fecha_pago'];
                $importe = $_POST['importe'];
                $metodo_pago = $_POST['metodo_pago'];

                // Mostrar mensaje de éxito
                echo '<div class="alert alert-success" role="alert">Los datos del pago han sido actualizados correctamente.</div>';
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pago'])) {
                $id_pago = $_GET['id_pago'];

                // Incluir el archivo de configuración y el modelo 
                require_once __DIR__ . '../../../config.php';
                require_once FACTURAS_MODEL_PATH . '/modelo_facturacion.php';

                // Ejecutar la acción para buscar el pago por ID
                $pago = consultar_pago_por_id($id_pago);

                if ($pago) {
                    // Rellenar los campos del formulario con los datos del contacto
                    $id_pago = $pago['id_pago'];
                    $id_factura = $pago['id_factura'];
                    $fechapago = $pago['fecha_pago'];
                    $importe = $pago['importe'];
                    $metodopago = $pago['metodo_pago'];
            ?>
                    <form method="POST" action="../controlador/controlador_facturacion.php">

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="id_pago">ID Pago:</label>
                                <input type="text" class="form-control" name="id_pago" value="<?php echo $id_pago; ?>" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="actualizarPago">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="id_factura">ID Factura:</label>
                                <input type="text" class="form-control" id="id_factura" name="id_factura" value="<?php echo $id_factura; ?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="fecha_pago">Fecha de Pago:</label>
                                <input type="date" class="form-control" id="fecha_pago" name="fecha_pago" value="<?php echo $fechapago; ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="importe">Importe:</label>
                                <input type="text" class="form-control" id="importe" name="importe" value="<?php echo $importe; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="metodo_pago">Metodo de Pago:</label>
                            <select id="metodo_pago" name="metodo_pago" class="form-control" required value="<?php echo $metodopago; ?>">
                                <option value="tarjeta">Tarjeta</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-sm">Actualizar Pago</button>
                        </div>
                    </form>
            <?php
                } else {
                    // Manejar el caso donde no se encontró el contacto
                    echo '<div class="alert alert-danger" role="alert">No se encontró ningún pago con el ID proporcionado.</div>';
                }
            } else {
                // Mostrar un mensaje si no se proporcionó el ID de contacto
                echo '<div class="alert alert-warning" role="alert">Por favor, ingresa un ID de pago válido.</div>';
            }
            ?>

            <div class="text-center mt-3">
                <a href="../vista/editar_pago_vista.php" class="btn btn-primary btn-sm">
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