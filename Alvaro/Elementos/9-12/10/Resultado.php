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
        <p>
        <?php
            if (isset ($_POST["teclado"])) {
            if ($_POST["teclado"] == "1") {
                $teclado = "Teclado 1: $";
                $tecladoPrecio = 1000;
            } else if ($_POST["teclado"] == "2") {
                $teclado = "Teclado 2: $";
                $tecladoPrecio = 2000;
            } else if ($_POST["teclado"] == "3") {
                $teclado = "Teclado 3: $";
                $tecladoPrecio = 4000;
            };
            echo "Teclado: <br>" . $teclado . $tecladoPrecio;
            echo "<br><br>";
            } else {
                echo "Sin teclado<br><br>";
                $tecladoPrecio = 0;
            };
            if (isset ($_POST["mouse"])) {
            if ($_POST["mouse"] == "1") {
                $mouse = "Mouse 1: $";
                $mousePrecio = 1000;
            } else if ($_POST["mouse"] == "2") {
                $mouse = "Mouse 2: $";
                $mousePrecio = 2000;
            } else if ($_POST["mouse"] == "3") {
                $mouse = "Mouse 3: $";
                $mousePrecio = 4000;
            };
            echo "Mouse: <br>" . $mouse . $mousePrecio;
            echo "<br><br>";
            } else {
                echo "Sin mouse<br><br>";
                $mousePrecio = 0;
            };
            if (isset ($_POST["monitor"])) {
            if ($_POST["monitor"] == "1") {
                $monitor = "Monitor 1: $";
                $monitorPrecio = 1000;
            } else if ($_POST["monitor"] == "2") {
                $monitor = "Monitor 2: $";
                $monitorPrecio = 2000;
            } else if ($_POST["monitor"] == "3") {
                $monitor = "Monitor 3: $";
                $monitorPrecio = 4000;
            };
            echo "Monitor: <br>" . $monitor . $monitorPrecio;
            echo "<br><br>";
            } else {
                echo "Sin monitor<br><br>";
                $monitorPrecio = 0;
            };
            echo '<div class="PT">';
            echo "Precio total: $" . $tecladoPrecio + $mousePrecio + $monitorPrecio;
            echo '</div>';
        ?>
        </p>
    </div>
</body>
</html>