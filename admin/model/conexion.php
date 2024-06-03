
<?php
// Propiedades de conexión
$host = 'localhost';
$dbname = 'citas';
$user = 'root';
$pass = '';

try {
    // Crear una nueva instancia de PDO
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    
    // Establecer el modo de error a excepción
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ejemplo de una consulta simple
    $stmt = $db->query("SELECT * FROM clientes");
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['nombres'] . '<br>';
    }
    
} catch (PDOException $error) {
    // Manejo de errores
    echo 'Error de conexión: ' . $error->getMessage();
    die();
}
?>
