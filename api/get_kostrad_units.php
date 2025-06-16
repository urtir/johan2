<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Database connection
$host = 'localhost';
$dbname = 'db_mapalutsista';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

try {
    $stmt = $pdo->query("
        SELECT 
            id,
            unit_code,
            unit_name,
            unit_type,
            headquarters
        FROM kostrad_units 
        WHERE status = 'active'
        ORDER BY unit_code
    ");
    
    $units = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($units);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
