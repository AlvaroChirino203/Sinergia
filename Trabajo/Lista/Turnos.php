<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Lista.css">
</head>
<body>
    <h1>Turnos</h1>
    <?php
        session_start();
        $db = new PDO('mysql:host=localhost;dbname=clinica','root', '');
        // Prepare and execute the first statement to fetch obras sociales
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_personal_info'])) { 
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_personal_info'])) {
                
                // Store form data in session
                $_SESSION['nombre'] = $_POST['nombre'];
                $_SESSION['apellido'] = $_POST['apellido'];
                $_SESSION['dni'] = $_POST['DNI'];
                $_SESSION['fechaNacimiento'] = $_POST['FechaNacimiento'];
                $_SESSION['telefono'] = $_POST['Telefono'];
                $_SESSION['correo'] = $_POST['Correo'];
                $_SESSION['domicilio'] = $_POST['Domicilio'];
            
                // Fetch obras sociales and professionals as usual
                $stmt = $db->prepare('SELECT obras_Nombre, obras_Descripcion FROM obrassociales');
                $stmt->execute();
                $obbrassociales = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
                $stmt = $db->prepare('SELECT prof_nombre, prof_apellido, Especialidad FROM profesionales');
                $stmt->execute();
                $profesionales = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            
        
    ?>
<div class="TurnosFormulario">
    <form method="post">
        <div class="Datos2">
            <div class="select">
                <label for="Diagnostico">Problema del paciente
                <label><input type="text" name="ProblemaPaciente" maxlength="100"></label>
            </div>
            <div class="checkbox">
                <label for="ObraSocial">Obra Social</label>
                <label><select name="ObraSocial">
                    <?php
                        foreach ($obbrassociales as $obra) {
                            echo '<option value="' . $obra['obras_Nombre'] . '" title="' . $obra['obras_Descripcion'] . '">' . $obra['obras_Nombre'] . '</option>';
                        }
                    ?>
                </select></label>
            </div>
            <div class="select">
                <label for="Terapeuta">Terapeuta</label>
                <label><select name="Terapeuta">
                    <?php
                        foreach ($profesionales as $profesional) {
                            echo '<option value="' . $profesional['prof_nombre'] .' '. $profesional['prof_apellido'] . '" title="' . $profesional['Especialidad'] . '">' . $profesional['prof_nombre'] .' ' . $profesional['prof_apellido'] . '</option>';
                        }
                    ?>
                </select></label>
            </div>
        </div>
        <div class="Datos3">
            <div class="select">
                <label for="TurnoHora">Hora</label>
                <label><input type="time" name="TurnoHora" required></label>
            </div>
            <div class="select">
                <label for="TurnoFecha">Fecha</label>
                <label><input type="date" name="TurnoFecha" required></label>
            </div>
        </div>
        <input type="submit" name="submit_turno" value="Confirmar Turno">
    </form>
</div>

        <?php
    } else {
        ?>
        <div class="TurnosFormulario">
            <p>Ingrese sus datos</p>
            <form method="post">
                <div class="Datos">
                    <div class="Izquierda">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" required>
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" required>
                        <label for="DNI">DNI</label>
                        <input type="number" name="DNI" required>
                    </div>
                    <div class="Derecha">
                        <label for="FechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" name="FechaNacimiento" required>
                        <label for="Telefono">Teléfono</label>
                        <input type="number" name="Telefono" required>
                        <label for="Correo">Correo electrónico</label>
                        <input type="email" name="Correo" required>
                    </div>
                </div>
                <div class="Derecha">
                    <label for="Domicilio">Domicilio</label>
                    <input type="text" name="Domicilio" required>
                </div>
                <input type="submit" name="submit_personal_info" value="Enviar">
            </form>
        </div>
        
        <?php
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_turno'])) {
        // Retrieve session variables for personal info
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        $dni = $_SESSION['dni'];
        $fechaNacimiento = $_SESSION['fechaNacimiento'];
        $telefono = $_SESSION['telefono'];
        $correo = $_SESSION['correo'];
        $domicilio = $_SESSION['domicilio'];
    
        // Get the turno-related data
        $ObraSocial = $_POST['ObraSocial'];
        $Terapeuta = $_POST['Terapeuta'];
        $TurnoHora = $_POST['TurnoHora'];
        $TurnoFecha = $_POST['TurnoFecha'];
        $ProblemaPaciente = $_POST['ProblemaPaciente'];
        $Paciente = $nombre.' '.$apellido;
    
        // Insert into the 'pacientes' table
        $stmt = $db->prepare('INSERT INTO pacientes (Pac_Nombre, Pac_Apellido, DNI, Pac_Domicilio, Pac_Cel, `Pac_E-mail`, Pac_FechaDeNacimiento) VALUES (:Pac_Nombre, :apellido, :dni, :Domicilio, :telefono, :correo, :fecha_nacimiento)');
        $stmt->bindParam(':Pac_Nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':dni', $dni);
        $stmt->bindParam(':Domicilio', $domicilio);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':fecha_nacimiento', $fechaNacimiento);
        $stmt->execute();
    
        // Insert the turno
        $stmt = $db->prepare('INSERT INTO Turnos (Fecha, Hora, Cancelado, Profesional, Paciente, Obrasocial, Problema_Paciente) VALUES (:Fecha, :Hora, "No", :Profesional, :Paciente, :Obrasocial, :Problema_Paciente)');
        $stmt->bindParam(':Fecha', $TurnoFecha);
        $stmt->bindParam(':Hora', $TurnoHora);
        $stmt->bindParam(':Profesional', $Terapeuta);
        $stmt->bindParam(':Paciente', $Paciente);
        $stmt->bindParam(':Obrasocial', $ObraSocial);
        $stmt->bindParam(':Problema_Paciente', $ProblemaPaciente);
        $stmt->execute();

        //insert values in
    
        // Clear session data
        session_unset();
        session_destroy();
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit;
        $db = null;
    }
    
    ?>
</body>
</html>