<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>xX$Pagina$Xx</title>
    <link rel="stylesheet" href="CSS.css">
    <link rel="icon" href="Elementos/imagenes/emoji-internet-meme-emoticon-doge-smiley-png-324b598f2f3f32811bd7ec073232bdd3.png">
</head>
<body>   
    <div class="Todo">
        <?php
        $SL = "<br><br>"; 
        echo '<div class="Consignas_1-8">';
            echo '<div class="Consignas_1-6">';
                echo '<div class="Consignas_1-5">';
                    echo '<div class="Consignas_1-3">';
                        echo '<div class="Consignas_1-2">';
                            //1- Imprimir en pantalla el día que es.
                            echo '<div class="Consigna_1">';
                                echo "1) Dia de hoy";
                                echo $SL;
                                $Dia = date("j");
                                $Mes = date("n");
                                $Año = date("Y");
                                echo "Hoy es $Dia del mes $Mes del año $Año";
                            echo '</div>';
                            //2- Hacer un programa que muestre por pantalla al valor generado con la función rand entre 1 y 100. 
                            echo '<div class="Consigna_2">';

                                echo "2) Funcion rand";
                                echo $SL;
                                rand();
                                rand();
                                $Rand = rand(1,100);
                                echo "El numero generado es: $Rand";
                            echo '</div>';  
                        echo '</div>';
                        //3- Crear las variables y mostrarlas por pantalla.
                        echo '<div class="Consigna_3">';
                            echo "3) Variables en pantalla$SL";
                            $dia = 24;
                            $sueldo = 758.43;
                            $nombre = "Juan";
                            $exite = true;
                            echo "el dia es $dia $SL el sueldo es $sueldo $SL el nombre es $nombre $SL $exite";
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="Consignas_4-5">';
                        //4- Crear variables con sus datos: nombre y apellido, edad, curso año y división, imprimirlas en pantallas con un solo echo concatenado.
                        echo '<div class="Consigna_4">';
                            echo "4) Variables con datos$SL";
                            $Nombre = "Alvaro Chirino";
                            $Edad = 18;
                            $Año = "6to";
                            $Division = "I";
                            echo "Mi nombre es " . $Nombre . ", tengo " . $Edad . " años y soy de " . $Año . $Division;
                        echo '</div>';
                        //5- Generar un valor aleatorio entre 1 y 3 y luego imprimir en castellano el número.
                        echo '<div class="Consigna_5">';
                            echo "5) valor entre 1 y 3$SL";
                            $Rand3 = rand(1,3);
                            if ( $Rand3 == 1) {
                                $Rand2 = "Uno";
                            } else if ( $Rand3 == 2) {
                                $Rand2 = "Dos";
                            } else {
                            $Rand2 = "Tres";
                            };
                            echo "El numero generado es: $Rand2";
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                //6- Imprimir los números del 1 al 100 con las estructuras de control for y while.
                echo '<div class="Consigna_6">';
                    echo "6) Numeros del 1 al 100$SL";
                    echo "Con for:<br>";        
                    for ($Num = 1; $Num <= 100; $Num ++) {
                        echo $Num . " ";
                    };
                    echo $SL;
                    echo "con while:<br>";
                    $Num2 = 1;
                    while ($Num2 <= 100) {
                    echo $Num2 . " ";
                    $Num2 ++;
                    };
                echo '</div>';
            echo '</div>'; 
            echo '<div class="Consignas_7-8">';
                //7- Imprimir los números pares del 1 al 100 con la estructura de control for.
                echo '<div class="Consigna_7">';
                    echo "7) Numeros pares:$SL";
                    for ($Num3 = 1; $Num3 <=100; $Num3 ++) {
                    if (($Num3 % 2) == 0) {
                            echo $Num3 . " ";
                        };
                    };
                echo '</div>';
                //8- Imprimir los números impares del 1 al 100 con la estructura de control while.
                echo '<div class="Consigna_8">';
                    echo "8) Numeros impares:$SL";
                    for ($Num4 = 1; $Num4 <=100; $Num4 ++) {
                        if (($Num4 % 2) == 1) {
                            echo $Num4 . " ";
                        };
                    };
                echo '</div>';
            echo '</div>';
        echo '</div>'
        ?>
        <div class="Consignas_9-12">
            <div class="Consignas_9-11">
                <div class="Consigna_9">
                    9) volumen de un cilindro
                    <iframe src="Elementos/9-12/9/Alvaro.php" class="C9" frameborder="0"  ></iframe><br>
                    <iframe name="9R" src="Elementos/9-12/9/Resultado.php" class="C9R" frameborder="0"></iframe>
                </div>
                    <div class="Consigna_10">
                        10) Precio de productos
                        <div class="C-R10">
                            <iframe class="C10" src="Elementos/9-12/10/Alvaro.php" frameborder="0"></iframe>
                            <iframe name="10R"class="C10R" src="Elementos/9-12/10/Resultado.php" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="Consigna_11">
                        11) Tiempo de llenado
                        <iframe class="C11" src="Elementos/9-12/11/alvaro.php" frameborder="0"></iframe>
                        <iframe class="C11R" name="11R"src="Elementos/9-12/11/resultado.php" frameborder="0"></iframe>
                    </div>
            </div>
            <div class="Consigna_12">
                12) Nombre y deportes que practica
                <div class="C-R12">
                    <iframe class="C12"src="Elementos/9-12/12/Alvaro.php" frameborder="0"></iframe>
                    <iframe class="C12R" name="12R"src="Elementos/9-12/12/Resultados.php" frameborder="0"></iframe>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>