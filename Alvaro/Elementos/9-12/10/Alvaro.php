<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <!--Diseñar un formulario web simple con php que pida al usuario el precio de tres
        productos en tres establecimientos distintos denominados “Tienda 1”, “Tienda 2” y
        “Tienda 3”. Una vez se introduzca esta información se debe calcular y mostrar el precio
        medio del producto.-->
    <form class="Formulario" action="Resultado.php" method="post" target="10R">
            <div class="Teclado">
                <p>Teclado:<br>
                teclado 1<input type="radio" name="teclado" value="1">
                teclado 2<input type="radio" name="teclado" value="2">
                teclado 3<input type="radio" name="teclado" value="3">
                </p>
            </div>
            <div class="Mouse">
                <p>Mouse:<br>
                mouse 1<input type="radio" name="mouse" value="1">
                mouse 2<input type="radio" name="mouse" value="2">
                mouse 3<input type="radio" name="mouse" value="3">
                </p>
            </div>
            <div class="Monitor">
                <p>Monitor:<br>
                monitor 1<input type="radio" name="monitor" value="1">
                monitor 2<input type="radio" name="monitor" value="2">
                monitor 3<input type="radio" name="monitor" value="3">
                </p>
            </div>
                <p>
                <input type="submit" class="Submit" value="Enviar">
                </p>
    </form>
</body>
</html>