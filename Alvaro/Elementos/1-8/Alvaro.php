<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS.css">
</head>

<body>
<div class="centrado">
    <?php
        $SL = "<br><br>";
        
        //1- Imprimir en pantalla el día que es.
        echo '<div class="Consigna_1">';
        echo "1) Dia de hoy";
        echo $SL;
        $Dia = date("j");
        $Mes = date("n");
        $Año = date("Y");
        echo "Hoy es $Dia del mes $Mes del año $Año";
        echo '</div>';
        echo $SL;
        
       
        //2- Hacer un programa que muestre por pantalla al valor generado con la función rand entre 1 y 100. 
        echo '<div class="Consigna_2">';

        echo "2) Funcion rand";
        echo $SL;
        rand();
        rand();
        $Rand = rand(1,100);
        echo "El numero generado es: $Rand";
        
        echo '</div>';   
        echo $SL;
  
        
        //3- Crear las variables y mostrarlas por pantalla.
        echo '<div class="Consigna_3">';
        
        echo "3) Variables en pantalla$SL";
        $dia = 24;
        $sueldo = 758.43;
        $nombre = "Juan";
        $existe = true;
        echo "el dia es $dia<br>el sueldo es $sueldo<br>el nombre es $nombre<br>$existe";

        echo '</div>';
        echo $SL;
        
       
        //4- Crear variables con sus datos: nombre y apellido, edad, curso año y división, imprimirlas en pantallas con un solo echo concatenado.
        echo '<div class="Consigna_4">';
        
        echo "4) Variables con datos$SL";
        $Nombre = "Alvaro Chirino";
        $Edad = 17;
        $Año = "6to";
        $Division = "I";
        echo "Mi nombre es " . $Nombre . ", tengo " . $Edad . " años y soy de " . $Año . $Division;
        
        echo '</div>';
        echo $SL;
        
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
        echo $SL;
        
       
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
        echo $SL;
        
       
        //7- Imprimir los números pares del 1 al 100 con la estructura de control for.
        echo '<div class="Consigna_7">';
        echo "7) Numeros pares:<br>";
        for ($Num3 = 1; $Num3 <=100; $Num3 ++) {
           if (($Num3 % 2) == 0) {
                echo $Num3 . " ";
            };
        };

        echo '</div>';
        echo $SL;
        
       
        //8- Imprimir los números impares del 1 al 100 con la estructura de control while.
        echo '<div class="Consigna_8">';
        echo "8) Numeros impares:<br>";
        for ($Num4 = 1; $Num4 <=100; $Num4 ++) {
            if (($Num4 % 2) == 1) {
                echo $Num4 . " ";
            };
        };
       
        
        echo '</div>';
        echo "$SL $SL $SL $SL";
    ?>    
<div>
</body>
</html>