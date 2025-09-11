<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['opcion']))
    {
        $numero = floatval($_POST['num']);
        $tipo = $_POST['opcion'];

        if ($tipo == "Celsius")
        {
            $resultado = (($numero -32) * (5/9));
            $respuesta = "El resultado de convertir " . $numero . "F° es " . $resultado . "°C";   
        }
        else if ($tipo == "Farenheit")
        {
            $resultado = (($numero * (5/9)) + 32);
            $respuesta = "El resultado de convertir " . $numero . "C° es " . $resultado . "°F";   
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h1> Conversor de grados </h1>
    <hr>
    <p>Ingresa el valor y a que lo quieres convertir </p>
        <form method="post" action="">
        <input type="number" name="num" id="num" placeholder="Ingresa una cantidad" required>
        <select name="opcion" id="opcion">
            <option value="Farenheit">Farenheit</option>
            <option value="Celsius">Celsius</option>
        </select><br><br>
        <input type="submit" name="submit" value="Enviar">
    </form>
<?php
if(!empty($respuesta))
{
    echo "<br>";
    echo "<h2>Estas convirtiendo a " . $tipo . "</h2>";
    echo $respuesta;
}
?>
</body>
</html>