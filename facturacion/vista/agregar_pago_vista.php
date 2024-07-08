<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="card p-5 position-absolute top-50 start-50 translate-middle" style="background-color: rgba(000, 000, 000, 0.3);box-shadow: 0 0 10px rgba(0,0,0,0.3);">
        <h2 class="text-center lead" style="border-radius:5px; font-size:xx-large"><strong> Registro de Pagos en Base De Datos </strong></h2>
        <form method="POST" action="../controlador/controlador_facturacion.php">
            <input type="hidden" name="action" value="agregarPago">
            <div class="form-group">
                <label for="id_factura">ID Factura:</label>
                <input type="text" id="id_factura" name="id_factura" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_pago">Fecha Pago:</label>
                <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="importe">Importe:</label>
                <input type="text" id="importe" name="importe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="metodo_pago">Metodo de Pago:</label>
                <select id="metodo_pago" name="metodo_pago" class="form-control" required>
                    <option value="tarjeta">Tarjeta</option>
                    <option value="efectivo">Efectivo</option>
                    <option value="transferencia">Transferencia</option>
                </select>
            </div>
            <br>
            <div class="btn-container">
                <button type="submit" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                    Registrar
                </button>
                <a href="../index_facturacion.php" class="btn btn-primary btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                        <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    Inicio
                </a>
            </div>
        </form>
    </div>

</body>

</html>