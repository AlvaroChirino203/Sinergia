<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    
    <!--Diseñar un formulario web que pida la altura y el diámetro de un cilindro en metros.
    Una vez el usuario introduzca los datos y pulse el botón calcular, deberá calcularse el
    volumen del cilindro y mostrarse el resultado en el navegador.-->
    <form action="Resultado.php" method="post" target="9R">
        <p>altura:<br><input type="number" max="9999" step="0.01" class="numero" name="altura" value="0"> Metros</p>
        <br><p>diametro:<br><input type="number" max="9999" step="0.01" class="numero" name="diametro" value="0"> Metros</p>
        <br><p><input type="submit" value="Calcular"></p>
    </form>
</body>
</html>