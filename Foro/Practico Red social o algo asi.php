<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Foro.css">
</head>
<body>
    <div class="Temas">
        <h2>Temas</h2>
        <form method="post" autocomplete="off">
            <input type="text" placeholder="Tema" maxlength="100" name="Tema" required>
            <input type="submit" value="Publicar">
        </form>

        <?php
        $disallowedCharacters = array("`", "'", "\"", "\\", "/", "*", "?", "<", ">", "|", "#", "%", "$", "&", "@", "=", "+", "-", "_", "[", "]", "{", "}", "(", ")", ":", ";", ",", ".", "!", " ");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['Tema'])) {
                $Tema = $_POST['Tema'];

                try {
                    $conexion = new PDO('mysql:host=localhost;dbname=red_social','root', '');
                    $stmt = $conexion->prepare("SELECT COUNT(*) AS count FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'red_social' AND TABLE_NAME = :Tema");
                    $stmt->bindParam(':Tema', $Tema);
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
                    if ($result['count'] == 0) {
                        $conexion->query("CREATE TABLE IF NOT EXISTS `$Tema` (
                            `ID` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                            `Comentario` VARCHAR(500) NOT NULL,
                            `Usuario` VARCHAR(50) NULL,
                            `Fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                        )");
                    }
        
                    //Close the connection
                    $conexion = null;
                } catch (PDOException $e){
                    echo 'Fallo la conexion: ' , $e->getMessage();
                }
            }
        }

        try {
            $conexion = new PDO('mysql:host=localhost;dbname=red_social','root', '');
            $stmt = $conexion->query("SELECT TABLE_NAME AS Tema FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'red_social'");
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                $tema = $row['Tema'];
                $filename = "Temas/" . str_replace($disallowedCharacters, '', $tema) . ".php";
                if (!file_exists($filename)) {
                    $fileContent = "<?php\n";
                    $fileContent .= "    try {\n";
                    $fileContent .= "        \$conexion = new PDO('mysql:host=localhost;dbname=red_social','root', '');\n";
                    $fileContent .= "        \$stmt = \$conexion->query(\"SELECT * FROM `$tema` ORDER BY Fecha DESC\");\n";
                    $fileContent .= "        foreach (\$stmt->fetchAll(PDO::FETCH_ASSOC) as \$row) {\n";
                    $fileContent .= "            echo '<div class=\"Comentario\">';\n";
                    $fileContent .= "            echo '<h4>' . \$row['Usuario'] . '</h4>';\n";
                    $fileContent .= "            echo '<p>' . \$row['Comentario'] . '</p>';\n";
                    $fileContent .= "            echo '<p>' . \$row['Fecha'] . '</p>';\n";
                    $fileContent .= "            echo '</div>';\n";
                    $fileContent .= "        }\n";
                    $fileContent .= "        //Close the connection\n";
                    $fileContent .= "        \$conexion = null;\n";
                    $fileContent .= "    } catch (PDOException \$e){\n";
                    $fileContent .= "        echo 'Fallo la conexion: ' , \$e->getMessage();\n";
                    $fileContent .= "    }\n";
                    $fileContent .= "?>";
                    file_put_contents($filename, $fileContent);
                }
                echo '<a href="' . $filename . '">';
                echo '<div class="Tema">';
                echo "<h3>" . ucfirst(strtolower($tema)) . "</h3>";
                echo "</div>";
                echo "</a>";
            }
            
            //Close the connection
            $conexion = null;
        } catch (PDOException $e){
            echo 'Fallo la conexion: ' , $e->getMessage();
        }
        ?>
    </div>
    <div class="Comentarios">
        <div class="container">
            <?php
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['Usuario']) && isset($_POST['Comentario'])) {
                        $Usuario = $_POST['Usuario'];
                        $Comentario = $_POST['Comentario'];
                        

                        try {
                            $conexion = new PDO('mysql:host=localhost;dbname=red_social','root', '');
                            $stmt = $conexion->prepare("SELECT COUNT(*) AS count FROM `$tema` WHERE Usuario = :Usuario");
                            $stmt->bindParam(':Usuario', $Usuario);
                            $stmt->execute();
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($result['count'] == 0) {
                                $stmt = $conexion->prepare("INSERT INTO `$tema` (Usuario, Comentario) VALUES (:Usuario, :Comentario)");
                                $stmt->bindParam(':Usuario', $Usuario);
                                $stmt->bindParam(':Comentario', $Comentario);
                                $stmt->execute();
                            }
                            
                            
                        } catch (PDOException $e){
                            echo 'Fallo la conexion: ' , $e->getMessage();
                        }
                    }
                }
                include $filename;
            ?>
            <div class="Comentar">
                <form method="post">
                    <input type="text" maxlength="50" name="Usuario">
                    <textarea style="width: 100%; height: 120px; resize: none;" maxlength="500" name="Comentario" required></textarea>
                    <input type="submit" value="Comentar" class="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>