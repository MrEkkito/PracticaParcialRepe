<?php
// index.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen Parcial - Menú</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        .menu {
            margin-top: 30px;
        }
        a {
            margin: 10px;
            padding: 12px;
            background: #108AB1;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            width: 250px;
            margin-left: auto;
            margin-right: auto;
            transition: 0.3s;
        }
        a:hover {
            background: #06D7A0;
        }
    </style>
</head>
<body>
    <h1>Examen Parcial - Ejercicios PHP</h1>
    <div class="menu">
        <a href="ejercicio1.php">Ejercicio 1: Personajes de Shrek</a>
        <a href="ejercicio2.php">Ejercicio 2: Conversor de Temperaturas</a>
        <a href="ejercicio3.php">Ejercicio 3: Compras con IVA y Descuentos</a>
    </div>
</body>
</html>
