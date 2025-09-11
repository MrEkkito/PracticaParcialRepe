<?php
// Arreglo de compras: producto, precio (sin IVA) y cantidad
$compras = [
    ["producto" => "Camiseta", "precio" => 10.00, "cantidad" => 2],
    ["producto" => "Pantalón", "precio" => 20.00, "cantidad" => 5],
    ["producto" => "Zapatos", "precio" => 35.00, "cantidad" => 1]
];

// Cupón ingresado por el usuario (puedes probar con "AHORRO10" o "ENVIOGRATIS")
$cupon = isset($_POST['cupon']) ? strtoupper(trim($_POST['cupon'])) : "";

// Inicializar acumuladores
$subtotalGeneral = 0;

// Calcular subtotales por producto considerando descuentos por volumen
foreach ($compras as &$compra) {
    $precio = $compra['precio'];
    $cantidad = $compra['cantidad'];
    $subtotal = $precio * $cantidad;

    // Descuento por volumen (5% si cantidad >= 5)
    if ($cantidad >= 5) {
        $subtotal *= 0.95;
    }

    $compra['subtotal'] = $subtotal;
    $subtotalGeneral += $subtotal;
}
unset($compra);

// Aplicar cupón de descuento si corresponde
$descuentoCupon = 0;
$envioGratis = false;

if ($cupon === "AHORRO10") {
    $descuentoCupon = $subtotalGeneral * 0.10;
} elseif ($cupon === "ENVIOGRATIS") {
    $envioGratis = true;
}

$subtotalConCupon = $subtotalGeneral - $descuentoCupon;

// Calcular IVA
$iva = $subtotalConCupon * 0.13;

// Costo de envío
$envio = 2.99;
if ($subtotalConCupon >= 25 || $envioGratis) {
    $envio = 0;
}

// Total final
$total = $subtotalConCupon + $iva + $envio;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura de Compras</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #444; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        .resumen { width: 60%; margin: 20px auto; font-family: Arial, sans-serif; }
    </style>
</head>
<body>

<h2 style="text-align:center;">Detalle de Compras</h2>

<table>
    <tr>
        <th>Producto</th>
        <th>Precio (sin IVA)</th>
        <th>Cantidad</th>
        <th>Subtotal</th>
    </tr>
    <?php foreach ($compras as $compra): ?>
    <tr>
        <td><?= htmlspecialchars($compra['producto']) ?></td>
        <td>$<?= number_format($compra['precio'], 2) ?></td>
        <td><?= $compra['cantidad'] ?></td>
        <td>$<?= number_format($compra['subtotal'], 2) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="resumen">
    <p><strong>Subtotal:</strong> $<?= number_format($subtotalGeneral, 2) ?></p>
    <p><strong>Descuento Cupón:</strong> -$<?= number_format($descuentoCupon, 2) ?></p>
    <p><strong>Subtotal con Descuento:</strong> $<?= number_format($subtotalConCupon, 2) ?></p>
    <p><strong>IVA (13%):</strong> $<?= number_format($iva, 2) ?></p>
    <p><strong>Costo de Envío:</strong> $<?= number_format($envio, 2) ?></p>
    <hr>
    <p><strong>Total a Pagar:</strong> $<?= number_format($total, 2) ?></p>
</div>

<!-- Formulario para ingresar cupón -->
<form method="post" style="text-align:center; margin-top:20px;">
    <label for="cupon">Ingrese cupón:</label>
    <input type="text" name="cupon" id="cupon" value="<?= htmlspecialchars($cupon) ?>">
    <button type="submit">Aplicar</button>
</form>
</body>
</html>
