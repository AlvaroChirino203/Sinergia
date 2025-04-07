<?php
// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access the form data using the $_POST superglobal variable
    $name = $_POST['name'];
    $knowledgeRating = $_POST['knowledge-rating'];
    $aiOpinion = $_POST['ai-opinion'];
    $interests = isset($_POST['interests']) ? $_POST['interests'] : []; // Check if interests is defined, otherwise set it to an empty array
    $feedback = $_POST['feedback'];

    // Validate form data
    if (empty($name) || empty($knowledgeRating) || empty($aiOpinion) || empty($interests)) {
        echo "No ha respondido todas las preguntas. Por favor, complete todos los campos obligatorios.<br>";
    } else {
        // Process the form data here (e.g., save it to a database)

        // Display the form data separated by answers only
        echo "<h2>Respuestas:</h2>";
        echo "<strong>Nombre:</strong><br>$name<br>";
        echo "<br>";

        echo "<strong>Calificación de conocimientos de IA:</strong><br>$knowledgeRating<br>";
        echo "<br>";

        echo "<strong>Opinión sobre IA en el estudio:</strong><br>$aiOpinion<br>";
        echo "<br>";

        echo "<strong>Áreas de interés en IA:</strong><br>";
        foreach ($interests as $interest) {
            if ($interest == "other" && isset($_POST['other-interest'])) {
                $otherInterest = $_POST['other-interest'];
                echo "$otherInterest<br>";
            } else {
                echo "$interest<br>";
            }
        }

        // Add a line break after displaying the interests
        echo "<br>";

        // Check if feedback is empty and display a message accordingly
        echo "<strong>Comentarios adicionales:</strong><br>";
        if (empty($feedback)) {
            echo "No hay comentarios adicionales.<br>";
        } else {
            echo "$feedback<br>";
        }
    }
}
?>