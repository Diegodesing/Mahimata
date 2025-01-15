<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configuración del correo
    $to = "corporacionmahimata@gmail.com"; // Dirección de correo de destino
    $subject = "Nuevo mensaje del formulario de contacto";
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $suggestions = htmlspecialchars($_POST['suggestions']);
    
    // Construir el mensaje
    $message = "Has recibido un nuevo mensaje del formulario de contacto:\n\n";
    $message .= "Nombre: $name\n";
    $message .= "Teléfono: $phone\n";
    $message .= "Correo Electrónico: $email\n";
    $message .= "Sugerencias: $suggestions\n";

    // Encabezados del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar correo
    if (mail($to, $subject, $message, $headers)) {
        echo "Mensaje enviado correctamente. Gracias por contactarnos.";
    } else {
        echo "Error al enviar el mensaje. Inténtalo nuevamente más tarde.";
    }
} else {
    echo "Acceso no permitido.";
}
?>