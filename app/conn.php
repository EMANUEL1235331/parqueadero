<?php
$host = "localhost";        // Servidor
$dbname = "mydb"; // Nombre de la base de datos
$user = "root";             // Usuario de MySQL (por defecto en XAMPP es root)                 // Contraseña (en XAMPP normalmente está vacía)

try {
    // Conexión PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "✅ Connection successful"; // Descomenta para probar
} catch (PDOException $e) {
    die("❌ Database connection failed: " . $e->getMessage());
}
?>