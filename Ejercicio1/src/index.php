<?php
$categorias = [
        "principal" => "Personajes principal",
        "amigos" => "Amigos de shrek",
        "villano" => "Villanos",
        "secundario" => "Personajes secundarios"
];

$personajes = [
    [
        "nombre" => "Lord farquad",
        "desc" => "Un villano no tal alto",
        "imagen" => "img1.jpg",
        "categoria" => ["villano", "principal"]
    ],
    [
        "nombre" => "Hermanastra fea",
        "desc" => "Una de las tres",
        "imagen" => "img2.jpg",
        "categoria" => ["secundario"]
    ], 
    [
        "nombre" => "Shrek",
        "desc" => "Una criatura verde",
        "imagen" => "img3.jpg",
        "categoria" => ["principal"]
    ],
    [
        "nombre" => "Burro",
        "desc" => "No se calla nunca",
        "imagen" => "img4.jpg",
        "categoria" => ["principal"]
    ],
    [
        "nombre" => "Jengi",
        "desc" => "Su papa es el panadero",
        "imagen" => "img5.jpg",
        "categoria" => ["secundario"]
    ]
];

$filtro = isset($_GET['categoria']) ? $_GET['categoria'] : "todos";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1> Personajes de shrek </h1>
    
<div class="menu">
            <a href="?categoria=todos">Todos</a>
    <?php foreach ($categorias as $key => $valor): ?>
        <a href="?categoria=<?= $key ?>"><?= $valor ?></a>
    <?php endforeach; ?>
</div>
<div class="personajes">
    <?php
    foreach ($personajes as $p) {
        if ($filtro == "todos" || in_array($filtro, $p["categoria"])) {
            echo "<div class='card'>";
            echo "<img src='images/{$p['imagen']}' alt='{$p['nombre']}'>";
            echo "<h3>{$p['nombre']}</h3>";
            echo "<p>{$p['desc']}</p>";
            $cats = [];
                foreach ($p['categoria'] as $c) {
            $cats[] = $categorias[$c];
            }
            echo "<p class='categoria'>" . implode(", ", $cats) . "</p>";    
            echo "</div>";
        }
    }
    ?>
</div>
</body>
</html>