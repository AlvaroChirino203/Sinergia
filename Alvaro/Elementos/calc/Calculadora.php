<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <form action="Resultados.php" method="post" target="EXTRAR">
        <p>
        <input type="number" value="1" name="Numero1"><br><br>
        <input type="radio" name="operacion" value="suma" checked>suma  +<br><br>
        <input type="radio" name="operacion" value="resta">resta  -<br><br>
        <input type="radio" name="operacion" value="multiplicacion">multiplicacion  ×<br><br>
        <input type="radio" name="operacion" value="division">division  ÷<br><br>
        <input type="number" value="1" name="Numero2"><br>
        <input type="submit" value="Calcular">
        <p>
    </form>
</body>
</html>