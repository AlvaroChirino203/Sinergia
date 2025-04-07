<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Lista.css">
</head>
<body>
    <div class="Busqueda">
        <form action="" method="GET">
            <label for="search">Buscar:<br>
            <input type="text" name="search" placeholder="Nombre, Apellido, Correo, Telefono, Domicilio"></label>
            <label for="Especialidad">Especialidad:<br>
            <select name="Especialidad">
                <option value="">Todos</option>
                <?php
                $db = new PDO('mysql:host=localhost;dbname=clinica','root', '');
                $stmt = $db->prepare('SELECT esp_nombre FROM especialidades');
                $stmt->execute();
                $especialidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($especialidades as $especialidad) {
                    echo "<option value=".$especialidad['esp_nombre'].">".$especialidad['esp_nombre']."</option>";
                }
                $db = null;
                ?>
            </select></label>
            <input type="submit" value="Buscar">
        </form>
    </div>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=clinica','root', '');
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $stmt = $db->prepare("SELECT * FROM profesionales WHERE prof_nombre LIKE :search OR `Pac_E-mail` LIKE :search OR prof_apellido LIKE :search OR prof_domicilio LIKE :search OR prof_cel LIKE :search OR prof_matricula LIKE :search");
    $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
    $stmt->execute();
    $profesionales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_GET['Especialidad']) && $_GET['Especialidad']!= '') {
        $especialidad = $_GET['Especialidad'];
        $stmt = $db->prepare("SELECT * FROM profesionales WHERE Especialidad = :especialidad");
        $stmt->bindParam(':especialidad', $especialidad);
        $stmt->execute();
        $profesionales = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    $db = null;
    ?>
    <div class="XD">
    <?php
    foreach ($profesionales as $profesional) {
        echo "<div class='Profesional'>";
            echo "<div class='ProfesionalIdentificacion'>";
                    echo "<div class='ProfesionalFoto'>";
                        echo '<img src="FotosProfesionales/null-user.jpg">';
                    echo "</div>";
                    echo "<div class='ProfesionalMatricula'>".$profesional['prof_matricula']."</div>";
                echo "</div>";
            echo "<div class='ProfesionalInfo'>";
                 echo "<p>Nombre: ".$profesional['prof_nombre']."</p>";
                echo "<p>Apellido: ".$profesional['prof_apellido']."</p>";
                echo "<p>Especialidad: ".$profesional['Especialidad']."</p>";
                echo "<p>Teléfono: ".$profesional['prof_cel']."</p>";
                echo "<p>Correo: ".$profesional['Pac_E-mail']."</p>";
                echo "<p>Domicilio: ".$profesional['prof_domicilio']."</p>";
            echo "</div>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>