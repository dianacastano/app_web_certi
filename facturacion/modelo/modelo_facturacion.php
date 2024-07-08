<?php

require_once __DIR__ . '../../../config.php';
require_once __DIR__ . '../../../conexion.php';

//Funciones Facturas
function agregar_factura($id_cliente, $fecha, $total, $impuestos, $descuentos, $total_final, $estado) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("INSERT INTO facturas (id_cliente, fecha, total, impuestos, descuentos, total_final, estado, activo) VALUES (?, ?, ?, ?, ?, ?, ?, 1)");
    $stmt->execute([$id_cliente, $fecha, $total, $impuestos, $descuentos, $total_final, $estado]);
    return $pdo->lastInsertId();
}

function eliminar_factura($id_factura, $activo) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("UPDATE facturas SET activo = ? WHERE id_factura = ?");
        $stmt->execute([$activo, $id_factura]);
    } catch (PDOException $e) {
        die("Error al actualizar el estado del contacto: " . $e->getMessage());
    }
}

function listar_facturas() {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT f.*, c.id_cliente, c.nombre FROM facturas f, clientes c WHERE f.activo = 1 AND f.id_cliente = c.id_cliente");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function consultar_factura_por_id($id_factura) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("SELECT * FROM facturas WHERE id_factura = ? AND activo = 1");
        $stmt->execute([$id_factura]);
        $factura = $stmt->fetch(PDO::FETCH_ASSOC);
        return $factura ? $factura : false;
    } catch (PDOException $e) {
        error_log('Error en la consulta consultar_factura_por_id: ' . $e->getMessage());
        return false;
    }
}

function actualizar_factura($id_factura, $id_cliente, $fecha, $total, $impuestos, $descuentos, $total_final, $estado) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("UPDATE facturas SET id_cliente = ?, fecha = ?, total = ?, impuestos = ?, descuentos = ?, total_final = ?, estado = ? WHERE id_factura = ?");
    $stmt->execute([$id_cliente, $fecha, $total, $impuestos, $descuentos, $total_final, $estado, $id_factura]);
}

//Funciones de Detalles Factura
function agregar_detalle($id_factura, $id_producto, $cantidad, $precio_unitario, $total) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("INSERT INTO detalles_factura (id_factura, id_producto, cantidad, precio_unitario, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id_factura, $id_producto, $cantidad, $precio_unitario, $total]);
    return $pdo->lastInsertId();
}

function eliminar_detalle($id_detalle) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("DELETE FROM detalles_factura WHERE id_detalle = ?");
        $stmt->execute([$id_detalle]);
    } catch (PDOException $e) {
        error_log('Error en la consulta eliminar_detalle: ' . $e->getMessage());
        return false;
    }
}

function listar_detalles() {
    $pdo = conectarBD();
    $stmt = $pdo->query("SELECT * FROM detalles_factura");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function actualizar_detalle($id_detalle, $id_factura, $id_producto, $cantidad, $precio_unitario, $total) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("UPDATE detalles_factura SET id_detalle = ?, id_factura = ?, id_producto = ?, cantidad= ?, precio_unitario = ?, total = ? WHERE id_detalle = ?");
    $stmt->execute([$id_detalle, $id_factura, $id_producto, $cantidad, $precio_unitario, $total, $id_detalle]);
}

function consultar_detalle_por_id($id_detalle) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("SELECT * FROM detalles_factura WHERE id_detalle = ?");
        $stmt->execute([$id_detalle]);
        $detalle = $stmt->fetch(PDO::FETCH_ASSOC);
        return $detalle ? $detalle : false;
    } catch (PDOException $e) {
        error_log('Error en la consulta consultar_pago_por_id: ' . $e->getMessage());
        return false;
    }
}


// funciones de Pagos

function agregar_pago($id_factura,  $fecha_pago, $importe, $metodo_pago ) {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("INSERT INTO Pagos (id_factura, fecha_pago, importe,  metodo_pago) VALUES (?, ?, ?, ?)");
    $stmt->execute([$id_factura,  $fecha_pago, $importe, $metodo_pago]);
    return $pdo->lastInsertId();
}

function listar_pagos() {
    $pdo = conectarBD();
    $stmt = $pdo->prepare("SELECT * FROM Pagos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function eliminar_pago($id_pago) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("DELETE FROM Pagos WHERE id_pago = ?");
        $stmt->execute([$id_pago]);
        return true; // éxito al eliminar
    } catch (PDOException $e) {
        error_log('Error en la consulta eliminar_pago: ' . $e->getMessage());
        return false; // error al eliminar
    }
}

function actualizar_pago($id_pago, $id_factura, $importe, $fecha_pago, $metodo_pago) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("UPDATE Pagos SET id_factura = ?, importe = ?, fecha_pago = ?, metodo_pago = ? WHERE id_pago = ?");
        $stmt->execute([$id_factura, $importe, $fecha_pago, $metodo_pago, $id_pago]);
        return true; // éxito al actualizar
    } catch (PDOException $e) {
        error_log('Error en la consulta actualizar_pago: ' . $e->getMessage());
        return false; // error al actualizar
    }
}


function consultar_pago_por_id($id_pago) {
    $pdo = conectarBD();
    try {
        $stmt = $pdo->prepare("SELECT * FROM pagos WHERE id_pago = ?");
        $stmt->execute([$id_pago]);
        $pago = $stmt->fetch(PDO::FETCH_ASSOC);
        return $pago ? $pago : false;
    } catch (PDOException $e) {
        error_log('Error en la consulta consultar_pago_por_id: ' . $e->getMessage());
        return false;
    }
}
?>
