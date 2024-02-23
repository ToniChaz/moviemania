<?php
// route
$requestUri = $_SERVER['REQUEST_URI'];

// Verificar si la URL comienza con '/api'
if (strpos($requestUri, '/api') === 0) {
    // La URL comienza con '/api', redirigir a la carpeta '/api'
    header("Location: /api$requestUri");
} else {
    // La URL no comienza con '/api', redirigir a la carpeta 'public'
    header("Location: /public$requestUri");
}
?>