<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <form class="Formulario" action="Resultados.php" method="post" target="12R">
        <p>
            Intruoduzca su nombre y apellido:<br>
            <input type="text" maxlength="45" name="Nombre"><br>
            <br>Seleccione los deportes que practica:<br>
            <input type="checkbox" name="Futbol">Futbol<br>
            <input type="checkbox" name="Basket">Basket<br>
            <input type="checkbox" name="Tennis">Tennis<br>
            <input type="checkbox" name="Voley">Voley<br>
            <input type="submit" value="Enviar">
        </p>
    </form>
</body>
</html>