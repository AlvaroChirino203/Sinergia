<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
    $num1 = $_POST["Numero1"];
    $num2 = $_POST["Numero2"];
    $operacion = $_POST["operacion"];
    if($operacion == "suma") {
        echo $num1 + $num2;
    } else if ($operacion == "resta") {
        echo $num1 - $num2;
    } else if ($operacion == "multiplicacion") {
        echo $num1 * $num2;
    } else if ($operacion == "division") {
        echo $num1 / $num2;
    };
?>