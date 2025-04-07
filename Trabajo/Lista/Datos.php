<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Information</title>
    <link rel="stylesheet" href="Lista.css">
</head>
<body class="DX">

<?php
// Database connection
$db = new PDO('mysql:host=localhost;dbname=clinica', 'root', '');
$stmt = $db->prepare('SELECT * FROM pacientes');
$stmt->execute();
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If the 'patient_id' parameter is set, display the details page
if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];
    $patient_details = array_filter($patients, function($patient) use ($patient_id) {
        return $patient['ID_Paciente'] == $patient_id;
    });
    $patient_details = reset($patient_details); // Get the first match

    if ($patient_details) {
        echo '<div class="Coso">';
        echo '<a href="Datos.php">Back to list</a>'; // Redirect to main page
        echo '</div>';
    }
} else {
    // Main list page if no patient_id is in the URL
    echo '<div class="Fila">';
    echo '<div class="Nombre"><h3>Nombre</h3></div>';
    echo '<div class="Apellido"><h3>Apellido</h3></div>';
    echo '<div class="Correo"><h3>Correo</h3></div>';
    echo '<div class="Telefono"><h3>Teléfono</h3></div>';
    echo '<div class="Direccion"><h3>Dirección</h3></div>';
    echo '<div class="DNI"><h3>DNI</h3></div>';
    echo '<div class="FechaNacimiento"><h3>Nacimiento</h3></div>';
    echo '</div>';

    // Display each patient as a clickable link
    foreach ($patients as $patient) {
        echo '<a href="?patient_id=' . $patient['ID_Paciente'] . '" class="Fila2">';
        echo '<div class="Nombre"><p>' . $patient['Pac_Nombre'] . '</p></div>';
        echo '<div class="Apellido"><p>' . $patient['Pac_Apellido'] . '</p></div>';
        echo '<div class="Correo"><p>' . $patient['Pac_E-mail'] . '</p></div>';
        echo '<div class="Telefono"><p>' . $patient['Pac_Cel'] . '</p></div>';
        echo '<div class="Direccion"><p>' . $patient['Pac_Domicilio'] . '</p></div>';
        echo '<div class="DNI"><p>' . $patient['DNI'] . '</p></div>';
        echo '<div class="FechaNacimiento"><p>' . $patient['Pac_FechaDeNacimiento'] . '</p></div>';
        echo '</a>';
    }
}

$db = null;
?>

</body>
</html>
