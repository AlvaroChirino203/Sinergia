<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>
<body>
    <!--Hacer un desarrollo web simple con PHP que dé respuesta a la necesidad que se
    plantea a continuación.
    - Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de
    dimensiones variables, que debe llenar de aceite a través de una toma con
    cierto caudal disponible. Se desea crear una aplicación web que le indique
    cuánto tiempo transcurrirá hasta el llenado del depósito. El caudal disponible
    se considera estable para los tiempos que tardan los llenados de depósitos y lo
    facilita el propio operario, aportando el dato en litros por minuto.-->
    <form action="resultado.php" method="post" target="11R">

    <p>caudal disponible:<br> <input class="Numero" max="9999" type="number" name="caudalDisponible" step="0.01" value="0"> Litros por minuto </p>
    <p>altura:<br> <input class="Numero" max="9999" type="number" name="altura" step="0.01" value="0"> Metros</p>
    <p>diametro:<br> <input class="Numero" max="9999" type="number"name="diametro" step="0.01" value="0"> Metros</p>
    <p><input class="Submit" type="submit" value="Calcular"></p>
    </form>
</body>
</html>