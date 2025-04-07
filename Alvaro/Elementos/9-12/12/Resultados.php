
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
            if (isset ($_POST["Nombre"])) {
                if ($_POST["Nombre"] == NULL) {
                    echo "Sin nombre";
                } else {
                    echo "Nombre:<br>" . $_POST["Nombre"];
                };
            } else {
                echo "Sin nombre";
            };
            
            echo "<br><br> Deportes que practica:";
            if (isset($_POST["Futbol"])) {
                echo "<br>Futbol";
            } else {
                $NoJuegaFutbol = true;
            };
            if (isset($_POST["Basket"])) {
                echo "<br>Basket";
            } else {
                $NoJuegaBasket = true;
            };
            if (isset($_POST["Tennis"])) {
                echo "<br>Tennis";
            } else {
                $NoJuegaTennis = true;
            };
            if (isset($_POST["Voley"])) {
                echo "<br>Voley";
            } else {
                $NoJuegaVoley = true;
            };
            if (isset($NoJuegaBasket, $NoJuegaFutbol, $NoJuegaTennis, $NoJuegaVoley)) {
                echo "<br>Ninguno";
            } else if (isset($_POST["Futbol"], $_POST["Tennis"], $_POST["Basket"], $_POST["Voley"])){
                $JuegaTodos = TRUE;
            };
            echo "<br><br>Deportes que no practica:";
            if (isset($NoJuegaFutbol)) {
                echo "<br>Futbol";
            };
            if (isset($NoJuegaBasket)) {
                echo "<br>Basket";
            };
            if (isset($NoJuegaTennis)) {
                echo "<br>Tennis";
            };
            if (isset($NoJuegaVoley)) {
                echo "<br>Voley";
            };
            if (isset($JuegaTodos)) {
                echo "<br>Nunguno";
            }
        ?>
    </div>
</body>
</html>