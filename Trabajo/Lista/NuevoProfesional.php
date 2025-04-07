<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Lista.css">
</head>
<body>
    <?php
        // Database connection to fetch specialities
        $db = new PDO('mysql:host=localhost;dbname=clinica','root', '');
        $stmt = $db->prepare('SELECT esp_nombre, esp_descripcion FROM especialidades');
        $stmt->execute();
        $especialidades = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $db = null;

        // Check if form is submitted and process the data
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_professional_info'])) {
            // Get the form data
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $terapia = $_POST['Terapia'];
            $telefono = $_POST['Telefono'];
            $correo = $_POST['Correo'];
            $domicilio = $_POST['Domicilio'];

            // Handle the base64-encoded image
            $imageBase64 = '';
            if (isset($_POST['imagen_base64'])) {
                $imageBase64 = $_POST['imagen_base64']; // The base64 string from the hidden input
            }

            try {
                // Connect to the database to insert data
                $db = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare SQL to insert the data into the database
                $stmt = $db->prepare("INSERT INTO profesionales (prof_nombre, prof_apellido, prof_matricula, prof_domicilio, prof_cel, `Pac_E-mail`, Especialidad, Foto) 
                                      VALUES (:first_name, :last_name, :matricula, :address, :phone, :email, :specialty, :photo)");

                // Generate a random matricula
                $matricula = rand(1000000, 9999999);

                // Bind parameters
                $stmt->bindParam(':first_name', $nombre);
                $stmt->bindParam(':last_name', $apellido);
                $stmt->bindParam(':matricula', $matricula);
                $stmt->bindParam(':address', $domicilio);
                $stmt->bindParam(':phone', $telefono);
                $stmt->bindParam(':email', $correo);
                $stmt->bindParam(':specialty', $terapia);
                $stmt->bindParam(':photo', $imageBase64);

                // Execute the insert query
                if ($stmt->execute()) {
                    echo "<h1>Se ha agregado al profesional</h1>";
                    echo "<div class='Profesional'>";
                    echo "<div class='ProfesionalIdentificacion'>";
                    echo "<div class='ProfesionalFoto'>";
                    if ($imageBase64) {
                        echo "<img src='data:image/jpeg;base64,$imageBase64' alt='Profesional Foto'>";
                    }
                    echo "</div>";
                    echo "<div class='ProfesionalMatricula'>$matricula</div>";
                    echo "</div>";
                    echo "<div class='ProfesionalInfo'>";
                    echo "<p>Nombre: $nombre</p>";
                    echo "<p>Apellido: $apellido</p>";
                    echo "<p>Especialidad: $terapia</p>";
                    echo "<p>Teléfono: $telefono</p>";
                    echo "<p>Correo: $correo</p>";
                    echo "<p>Domicilio: $domicilio</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "<a href='NuevoProfesional.php'>Volver</a>";
                } else {
                    echo "Error uploading the image and data!";
                }

                $db = null;

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            // If the form hasn't been submitted, show it
    ?>
    <div class="TurnosFormulario">
        <p>Ingrese los datos</p>
        <form method="post">
            <div class="Datos">
                <div class="Izquierda">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" required>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" required>
                    <label for="Terapia">Terapia que realiza<br>
                    <select name="Terapia">
                        <?php
                            foreach ($especialidades as $especialidad) {
                                echo '<option value="' . $especialidad['esp_nombre'] . '" title="' . $especialidad['esp_descripcion'] . '">' . $especialidad['esp_nombre'] . '</option>';
                            }
                        ?>
                    </select>
                    </label>
                </div>
                <div class="Derecha">
                    <label for="Telefono">Teléfono</label>
                    <input type="number" name="Telefono" required>
                    <label for="Correo">Correo electrónico</label>
                    <input type="email" name="Correo" required>
                    <label for="Domicilio">Domicilio</label>
                    <input type="text" name="Domicilio" required>
                </div>
            </div>
            <div class="Foto">
                <label for="imageInput">Foto (opcional)</label>
                <label for="imageInput" class="custom-file-input">Subir imagen</label>
                <input type="file" name="imagen" id="imageInput" accept="image/*">
            </div>
            <img id="imagePreview" src="FotosProfesionales/null-user.jpg" alt="">
            
            <!-- Hidden field to store base64 image -->
            <input type="hidden" name="imagen_base64" id="imagenBase64">
            
            <input type="submit" name="submit_professional_info" value="Enviar">
        </form>
    </div>

    <script>
        // Get elements
        const imageInput = document.getElementById('imageInput');
        const imagePreview = document.getElementById('imagePreview');
        const imagenBase64 = document.getElementById('imagenBase64');

        // Event listener for file input change
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0]; // Get the selected file
            if (file) {
                const reader = new FileReader();

                // When the file is read, update the preview
                reader.onload = function(e) {
                    // Display the image in the preview
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';

                    // Set the base64 image string in the hidden input
                    imagenBase64.value = e.target.result.split(',')[1]; // Extract base64 data
                };

                // Read the file as a data URL (base64)
                reader.readAsDataURL(file);
            }
        });
    </script>

    <?php
        }
    ?>
</body>
</html>
