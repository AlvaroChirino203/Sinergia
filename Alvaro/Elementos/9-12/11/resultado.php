<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
<div class="Resultado">
<?php
    if (isset($_POST["caudalDisponible"]) && isset($_POST["altura"]) && isset($_POST["diametro"])) {
        $CD = $_POST["caudalDisponible"];
        $altura = $_POST["altura"];
        $diametro = $_POST["diametro"];
        if ($CD == 0) {
            echo "No se puede calcular si el caudal disponible esta en 0";
        } else {
        $pi = pi();
        $R = $diametro / 2;
        $V = $pi * ($R * $R) * $altura;
        $VL = $V * 1000;
        $TM = $VL / $CD;
        echo "el tanque se llenara en " . round($TM,2) . " minutos";
        };
    } else {
        echo "Ingresar datos";
    }
?>
</div>
</body>
</html>