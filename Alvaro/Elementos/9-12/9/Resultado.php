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
        if (isset ($_POST["altura"]) && isset ($_POST["diametro"])) {
            $altura = $_POST["altura"];
            $diametro = $_POST["diametro"];
            $pi = pi();
            $R = $diametro / 2;
            $V = $pi * ($R * $R) * $altura;
            echo "El volumen es de " .round($V,2). " metros cubicos";
        } else {
            echo "Ingresar datos";
        }
    
    ?>
    </div>      
</body>
</html>
